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
        Schema::create('konsumens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('bidang_perusahaan');
            $table->string('alamat');
            $table->string('wilayah');
            $table->string('pic');
            $table->string('npwp');
            $table->string('no_akta');
            $table->enum('pkp', ['Kompensasi', 'Non-PKP', 'PKP']);
            $table->string('kategori');
            $table->text('deskripsi');
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
        Schema::dropIfExists('konsumens');
    }
};
