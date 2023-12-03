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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('subtitle')->nullable();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->longText('description');
            $table->string('writer_name')->nullable();
            $table->string('writer_address')->nullable();
            $table->string('writer_image')->nullable();
            $table->string('article_post_date')->nullable();
            $table->string('shares')->default(null);
            $table->string('status');
            // $table->foreign('writer_id')->references('id')->on('writers')
            //     ->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('writer_id')->constrained('writers')
            //     ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
