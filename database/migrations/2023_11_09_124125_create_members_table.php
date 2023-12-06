<?php

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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->enum('JK', ['Laki-laki', 'Perempuan']);
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('durasi');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->integer('total_biaya');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Menunggu Verifikasi'])->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
