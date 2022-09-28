<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('idt');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('idorder');
            $table->enum('status',['sudah','belum']);
            $table->enum('metode',['cod','transferbank']);
            $table->timestamps();

            $table->foreign('id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('idorder')->references('idorder')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
