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
        Schema::create('kunjungan_teknisis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kunjungan');
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('wilayah', ['Pekanbaru', 'Pontianak', 'Medan']);
            $table->string('pemakaian_air');
            $table->string('tonase_produksi');
            $table->text('proses_penjernihan');
            $table->text('pemakaian_bahan_kimia');
            $table->string('cost_penjernihan');
            $table->string('cost_penjernihan_boiler');
            $table->string('total_cost');
            $table->text('hasil_presentasi');
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
        Schema::dropIfExists('kunjungan_teknisis');
    }
};
