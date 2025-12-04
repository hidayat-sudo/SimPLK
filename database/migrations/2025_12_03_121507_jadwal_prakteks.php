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
        Schema::create('jadwal_prakteks', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('dokter_id');
            $table->string('hari', 100); 
            $table->time('jam_mulai'); 
            $table->time('jam_selesai'); 
            $table->integer('kuota_harian');
            
              $table->dropForeign(['dokter_id']);
             $table->foreign('dokter_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('jadwal_prakteks', function (Blueprint $table) {
            $table->dropForeign(['dokter_id']); // Hapus constraint cascade
            $table->foreign('dokter_id')->references('id')->on('users'); // Buat kembali tanpa cascade
        });
    }
};
