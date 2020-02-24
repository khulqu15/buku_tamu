<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi');
            $table->string('nama_peminjam');
            $table->string('phone_peminjam');
            $table->integer('inventaris_id')->unsigned();
            $table->foreign('inventaris_id')->references('id')->on('inventaris')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('pengembalian');
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
        Schema::dropIfExists('transaksis');
    }
}
