<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_pesanan', function (Blueprint $table) {
            $table->string('id_status_pesanan', 11);
            $table->string('nama_status_pesanan', 50);
            $table->string('urutan', 10);
            $table->timestamps();

            $table->primary('id_status_pesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_pesanan');
    }
}
