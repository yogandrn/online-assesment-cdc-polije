<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilMinatKarirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_minat_karir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_history_id')->constrained('test_histories');
            $table->foreignId('user_id')->constrained('users');
            $table->string('test_token');
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
        Schema::dropIfExists('hasil_minat_karir');
    }
}
