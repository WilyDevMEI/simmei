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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_po');
            $table->unsignedBigInteger('konsumen_id');
            $table->date('mulai_kontrak');
            $table->date('selesai_kontrak');
            $table->string('lama_kerjasama');
            $table->string('sistem_pembayaran');
            $table->string('file_po')->nullable();
            $table->string('keterangan');
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
        Schema::dropIfExists('relationships');
    }
};
