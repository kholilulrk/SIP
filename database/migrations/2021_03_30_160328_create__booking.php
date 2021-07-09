<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gedung');
            $table->foreignId('id_penyewa');
            $table->string('nama_gedung');
            $table->double('harga_sewa');
            $table->integer('status_bayar');
            $table->string('bukti_pembayaran');
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
        Schema::dropIfExists('_booking');
    }
}
