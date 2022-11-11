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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deal_id');
            $table->unsignedBigInteger('konsumen_id');
            $table->string('kategori');
            $table->string('nama_produk');
            $table->string('qty');
            $table->date('tanggal_surat_jalan');
            $table->string('no_surat_jalan');
            $table->enum('ekspedisi', ['Internal', 'Eksternal']);
            $table->string('pengirim_produk');
            $table->string('dikirim_dari');
            $table->text('keterangan');
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
        Schema::dropIfExists('supplies');
    }
};
