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
        Schema::create('sub_company_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sub_company_sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('sub_companies')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->longText('subtitle')->nullable();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->longText('description');
            $table->string('activity_post_date')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_company_activities');
    }
};
