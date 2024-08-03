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
    public function up() : void
    {
        Schema::create('assignees', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('group_name');
            $table->string('assignee_name');
            $table->string('email_id');
            $table->enum('active_status', ['true', 'false']);
            $table->string('account_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('assignees');
    }
};
