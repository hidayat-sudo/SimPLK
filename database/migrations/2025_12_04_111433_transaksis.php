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
       Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' sebagai BIGINT PRIMARY KEY auto-increment
            $table->unsignedBigInteger('rekam_medis_id');
            $table->decimal('total_biaya', 10, 2);
            $table->string('metode_bayar', 50);
            $table->enum('status_bayar', ['belum', 'lunas']);
            $table->dateTime('tanggal_bayar')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
