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
        Schema::create('sub_company_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sub_company_sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('sub_companies')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('designation')->default(null);
            $table->longText('introduction')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('status')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_company_teams');
    }
};
