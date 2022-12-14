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
        Schema::create('mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konsumen_id');
            $table->enum('wilayah', ['Pekanbaru', 'Pontianak', 'Medan']);
            $table->date('tanggal_mapping');
            $table->string('jarak_tempuh');
            $table->string('jumlah_peserta');
            $table->string('lama_mapping');
            $table->text('topik');
            $table->text('hasil_mapping');
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
        Schema::dropIfExists('mappings');
    }
};
