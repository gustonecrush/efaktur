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
        Schema::create('faktur_pajaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengusaha_kena_pajak')->references('id')->on('pengusaha_kena_pajaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_pembeli_kena_pajak')->references('id')->on('pembeli_kena_pajaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("no_seri_faktur")->unique();
            $table->integer('harga_jual');
            $table->integer('dikurangi_potongan_harga');
            $table->integer('dikurangi_uang_muka');
            $table->integer('dasar_pengenaan_pajak');
            $table->integer('total_ppn');
            $table->integer('total_ppnbm');
            $table->string('location');
            $table->string('ttd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_pajaks');
    }
};
