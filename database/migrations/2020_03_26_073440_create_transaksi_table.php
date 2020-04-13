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
            $table->increments('id_transaksi');
            $table->integer('member')->length(11);
            $table->integer('paket')->length(11);
            $table->integer('berat');
            $table->integer('biaya_tambahan');
            $table->integer('harga_total');
            $table->string('status_pesanan', 11);
            $table->string('status_pembayaran', 11);
            $table->date('tgl_bayar');
            $table->timestamps();

            $table->foreign('member')->references('id_member')->on('member')->onDelete('restrict');
            $table->foreign('paket')->references('id_paket')->on('paket')->onDelete('restrict');
            $table->foreign('status_pesanan')->references('id_status_pesanan')->on('status_pesanan')->onDelete('restrict');
            $table->foreign('status_pembayaran')->references('id_status_pembayaran')->on('status_pembayaran')->onDelete('restrict');
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
