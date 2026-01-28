<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tikets', function (Blueprint $table) {
            // tambahkan kolom ticket_type_id
            $table->foreignId('ticket_type_id')
                ->nullable()
                ->after('event_id')
                ->constrained('ticket_types')
                ->cascadeOnDelete();
        });

        // hapus kolom enum tipe
        Schema::table('tikets', function (Blueprint $table) {
            $table->dropColumn('tipe');
        });
    }

    public function down(): void
    {
        Schema::table('tikets', function (Blueprint $table) {
            $table->enum('tipe', ['reguler', 'premium'])->after('event_id');
            $table->dropConstrainedForeignId('ticket_type_id');
        });
    }
};
