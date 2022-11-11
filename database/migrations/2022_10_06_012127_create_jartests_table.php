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
        Schema::create('jartests', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_jartest');
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('wilayah', ['Pekanbaru', 'Pontianak', 'Medan']);
            $table->string('nama_produk');
            $table->string('dosis');
            $table->string('cost');
            $table->string('jenis_air');
            $table->string('parameter_air');
            $table->text('data_teknik');
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
        Schema::dropIfExists('jartests');
    }
};
