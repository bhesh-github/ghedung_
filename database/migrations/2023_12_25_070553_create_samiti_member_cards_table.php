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
        Schema::create('samiti_member_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('samiti_id')->constrained('samitis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('designation')->default(null);
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samiti_member_cards');
    }
};
