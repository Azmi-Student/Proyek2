<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('dokter');
            $table->string('jenis_periksa'); // baru
            $table->string('jadwal');
            $table->string('status')->default('Belum Diajukan');
            $table->timestamps();
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relasi dengan tabel users
            $table->text('hasil_checkup')->nullable(); // Kolom untuk menyimpan hasil check up
            $table->text('catatan')->nullable();  // Kolom catatan tambahan
            $table->integer('usia')->nullable(); // Kolom Usia
            $table->float('berat_badan')->nullable(); // Kolom Berat Badan
            $table->float('detak_jantung_janin')->nullable(); // Kolom Detak Jantung Janin
            $table->string('kondisi_cairan_ketuban')->nullable(); // Kolom Kondisi Cairan Ketuban
            $table->text('keluhan')->nullable(); // Kolom Keluhan
            $table->text('gambar_checkup')->nullable(); // Kolom untuk menyimpan nama gambar

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
