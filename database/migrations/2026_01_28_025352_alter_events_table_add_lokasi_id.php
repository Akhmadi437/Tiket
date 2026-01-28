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
        Schema::table('events', function (Blueprint $table) {
            // Hapus kolom 'lokasi' string jika ada
            if (Schema::hasColumn('events', 'lokasi')) {
                $table->dropColumn('lokasi');
            }
            // Tambah foreign key lokasi_id
            $table->foreignId('lokasi_id')
                ->nullable()
                ->after('tanggal_waktu')
                ->constrained('lokasis')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropConstrainedForeignId('lokasi_id');
            $table->string('lokasi')->nullable();
        });
    }
};
