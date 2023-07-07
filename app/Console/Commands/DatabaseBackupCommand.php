<?php

namespace App\Console\Commands;

use App\Models\Backup;
use App\Models\DetailHasilMinatKarir;
use App\Models\HasilKepribadian;
use App\Models\HasilMinatKarir;
use App\Models\TestHistory;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump database into sql using mysqldump';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $dir = 'backups'; 
            if (!file_exists(storage_path($dir))) { // cek apakah folder sudah ada
                mkdir(storage_path($dir)); // buat folder jika belum ada
            }

            $filename = 'backups/' . date('Y_m_d_His') . '_' . uniqid() . '.sql'; // generate random filename
            
            // membuat backup data dengan spatie/db-dumper
            MySql::create()
                ->setHost(env('DB_HOST'))
                ->setPort(env('DB_PORT'))
                ->setDbName(env('DB_DATABASE'))
                ->setUserName(env('DB_USERNAME'))
                ->setPassword(env('DB_PASSWORD'))
                ->includeTables('test_histories, hasil_kepribadian, hasil_minat_karir, detail_hasil_minat_karir')
                ->doNotCreateTables()
                ->addExtraOption('--skip-add-drop-table')
                ->addExtraOption('--skip-add-locks')
                ->dumpToFile(storage_path($filename));
            
            // menyimpan record backup ke dalam database
            Backup::create([
                'file_path' => $filename,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $now = \Carbon\Carbon::now()->format('Ymd H:i:s');

            // menghapus data yang sudah di-backup
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DetailHasilMinatKarir::where('id', '>', 0)->delete();
            HasilMinatKarir::where('id', '>', 0)->delete();
            HasilKepribadian::where('id', '>', 0)->delete();
            TestHistory::where('id', '>', 0)->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            echo $e;
        }
    }
}
