<?php

use App\Enums\Gender;
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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('country_id');
            $table->string('phone');
            $table->string('phone_verified_at');
            $table->string('address');
            $table->string('post_code');
            $table->string('city');
            $table->string('state');
            $table->date('birth_date');
            $table->string('description')->nullable();
            $table->enum('gender', [Gender::MALE->value, Gender::FEMALE->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table){
           $table->dropForeign(['user_id']);
           $table->dropForeign(['country_id']);
           $table->dropIfExists();
        });
        Schema::dropIfExists('vendors');
    }
};
