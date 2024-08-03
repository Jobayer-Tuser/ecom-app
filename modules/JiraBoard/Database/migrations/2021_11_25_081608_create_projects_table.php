<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id', 127);
            $table->string('project_key', 127);
            $table->string('project_name', 255);
            $table->string('project_type', 127)->nullable();
            $table->enum('project_status_on_pmo', ['Tracked', 'Untracked'])->default('Untracked');
            $table->datetime('last_sync')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
