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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('location_id')->index();
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->string('name_tm');
            $table->string('name_ru')->nullable();
            $table->unsignedTinyInteger('is_approved')->default(0);
            $table->text('description')->nullable();
            $table->unsignedInteger('age')->default(0);
            $table->string('full_name_tm');
            $table->string('full_name_ru')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->unsignedDouble('salary')->default(0);
            $table->unsignedInteger('viewed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
