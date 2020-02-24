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
            $table->increments('id');
            $table->string('level');
            $table->string('name');
            $table->string('nip');
            $table->string('foto')->nullable();
            $table->string('jabatan');
            $table->string('gender');
            $table->date('tgl_lahir');
            $table->string('tmp_lahir');
            $table->text('ruangan');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('api_token')->nullable();
            $table->rememberToken();
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
