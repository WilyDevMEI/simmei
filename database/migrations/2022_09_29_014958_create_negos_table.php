<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negos', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_nego');
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('wilayah', ['Pekanbaru', 'Medan', 'Pontianak']);
            $table->string('nama_produk');
            $table->string('harga');
            $table->string('sistem_pembayaran');
            $table->string('penerima');
            $table->text('hasil');
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
        Schema::dropIfExists('negos');
    }
};
