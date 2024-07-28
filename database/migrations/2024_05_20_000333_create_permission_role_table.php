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
        Schema::create('permission_role', function (Blueprint $table) {
           $table->foreignId(column: 'role_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
           $table->foreignId(column: 'permission_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign(index: ['role_id']);
            $table->dropForeign(index: ['permission_id']);
            $table->dropIfExists();
        });
    }
};
