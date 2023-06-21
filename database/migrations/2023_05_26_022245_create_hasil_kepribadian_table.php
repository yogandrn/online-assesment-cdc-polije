<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilKepribadianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_kepribadian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_history_id');
            $table->foreign('test_history_id')->references('id')->on('test_histories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('test_token');
            $table->float('tingkat', 10, 2);
            $table->foreignId('kepribadian_id')->constrained('kepribadian');
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
        Schema::dropIfExists('hasil_kepribadian');
    }
}
