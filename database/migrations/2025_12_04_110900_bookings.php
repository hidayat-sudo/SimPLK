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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' sebagai BIGINT PRIMARY KEY auto-increment
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('hewan_id');
            $table->date('tanggal_booking');
            $table->integer('no_antrean');
            $table->enum('status', ['pending', 'confirmed', 'selesai', 'batal']);
            $table->text('keluhan_awal');
            $table->timestamps(); // Menambahkan created_at dan updated_at

            // Definisi Foreign Key
            $table->foreign('jadwal_id')->references('id')->on('jadwal_prakteks');
            $table->foreign('hewan_id')->references('id')->on('hewans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('bookings');
    }
};
