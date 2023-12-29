<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_company_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_company_id')->constrained('sub_companies')->onUpdate('cascade')->onDelete('cascade');
            $table->string('section_name');
            $table->string('slug');
            $table->string('status')->default('None');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_company_sections');
    }
};