<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailHasilMinatKarirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_hasil_minat_karir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_minat_karir_id')->constrained('hasil_minat_karir');
            $table->foreignId('minat_karir_id')->constrained('minat_karir');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_hasil_minat_karir');
    }
}
