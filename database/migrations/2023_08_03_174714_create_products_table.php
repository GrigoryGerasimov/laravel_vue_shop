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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->text('content');
            $table->string('preview_img');
            $table->decimal('price');
            $table->integer('amount');
            $table->boolean('is_published')->default(true);
            $table->foreignId('category_id')->nullable()->index()->constrained('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
