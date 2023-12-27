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
        Schema::create('samiti_activity_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('samiti_id')->constrained('samitis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('file')->default(null);
            $table->string('status')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samiti_activity_pdfs');
    }
};
