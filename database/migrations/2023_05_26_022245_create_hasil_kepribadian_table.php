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
            $table->foreignId('test_history_id')->constrained('test_histories');
            $table->string('test_token');
            $table->foreignId('user_id')->constrained('users');
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
