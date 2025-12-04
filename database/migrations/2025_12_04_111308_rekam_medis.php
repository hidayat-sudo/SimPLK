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
       Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' sebagai BIGINT PRIMARY KEY auto-increment
            $table->unsignedBigInteger('booking_id');
            $table->text('diagnosa')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('resep_obat')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->dateTime('tanggal_periksa')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('booking_id')->references('id')->on('bookings');
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('rekam_medis');
    }
};
