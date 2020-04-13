<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pembayaran', function (Blueprint $table) {
            $table->string('id_status_pembayaran', 11);
            $table->string('nama_status_pembayaran', 50);
            $table->string('urutan', 10);
            $table->timestamps();

            $table->primary('id_status_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pembayaran');
    }
}
