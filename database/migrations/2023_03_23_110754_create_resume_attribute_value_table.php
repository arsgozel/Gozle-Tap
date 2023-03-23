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
        Schema::create('resume_attribute_value', function (Blueprint $table) {
            $table->unsignedBigInteger('resume_id')->index();
            $table->foreign('resume_id')->references('id')->on('resumes')->cascadeOnDelete();
            $table->unsignedBigInteger('attribute_value_id')->index();
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->primary(['resume_id', 'attribute_value_id']);
            $table->unsignedInteger('sort_order')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_attribute_value');
    }
};
