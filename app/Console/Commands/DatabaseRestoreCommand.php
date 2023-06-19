<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DatabaseRestoreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:restore {filepath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'restore data into database from sql file';

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
        $parameter = $this->argument('filepath'); // ambil data argument

        try {
            // Tentukan path file DB dump yang ingin di-restore
            $filepath = storage_path($parameter);

            // // Melakukan restore data dari file DB dump
            $sql = file_get_contents($filepath);
            DB::unprepared($sql);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            echo $e;
        }
    }
}
