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
            $table->unsignedBigInteger('hasil_minat_karir_id');
            $table->unsignedBigInteger('minat_karir_id');
            $table->foreign('hasil_minat_karir_id')->references('id')->on('hasil_minat_karir')->onDelete('cascade');
            $table->foreign('minat_karir_id')->references('id')->on('minat_karir')->onDelete('cascade');
            $table->integer('point');
            $table->timestamps();
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
