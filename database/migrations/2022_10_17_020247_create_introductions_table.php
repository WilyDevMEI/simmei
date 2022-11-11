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
        Schema::create('introductions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_input');
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('wilayah', ['Pekanbaru', 'Medan', 'Pontianak']);
            $table->string('mapping')->nullable();
            $table->string('penetrasi')->nullable();
            $table->string('plantest')->nullable();
            $table->string('quatation')->nullable();
            $table->string('deals')->nullable();
            $table->string('supply')->nullable();
            $table->string('kunjungan')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('introductions');
    }
};
