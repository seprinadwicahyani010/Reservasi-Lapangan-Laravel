<?php

use App\Models\Lapangan;
use App\Models\User;
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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pemesanan');
            $table->foreignIdFor(Lapangan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->string('no_hp');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_akhir');
            $table->enum('status', ['Menunggu Verifikasi', 'Sukses', 'Batal'])->default('Menunggu Verifikasi');
            $table->integer('total_harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
