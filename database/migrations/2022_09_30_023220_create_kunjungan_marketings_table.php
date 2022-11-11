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
        Schema::create('kunjungan_marketings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_interaksi');
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('kategori', ['Kunjungan Ditempat', 'Via Telepon']);
            $table->string('lama_interaksi');
            $table->string('penerima_telepon');
            $table->string('pic');
            $table->text('pembahasan');
            $table->text('kesimpulan');
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
        Schema::dropIfExists('kunjungan_marketings');
    }
};
