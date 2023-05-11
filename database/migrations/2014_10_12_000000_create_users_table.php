<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_kandidat');
            $table->string('nim');
            $table->string('nama');
            $table->string('jenjang');
            $table->string('jurusan');
            $table->string('program_studi');
            $table->string('foto')->default('img/photo.png');
            $table->string('ijazah')->default('img/ijazah.png');
            $table->string('no_telp');
            $table->string('url_linkedin')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->default('inactive');
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
        Schema::dropIfExists('users');
    }
}
