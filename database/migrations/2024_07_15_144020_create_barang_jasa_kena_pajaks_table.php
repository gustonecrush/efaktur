<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_jasa_kena_pajaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_faktur_pajak')->references('id')->on('faktur_pajaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_barang_jasa_kena_pajak');
            $table->string('harga_satuan');
            $table->integer('kuantitas');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_jasa_kena_pajaks');
    }
};
