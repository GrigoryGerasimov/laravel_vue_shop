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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->char('ean', 13)->nullable(false)->unique();
            $table->text('content');
            $table->string('preview_img');
            $table->decimal('purchase_price');
            $table->decimal('recommended_retail_price');
            $table->integer('total_amount');
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
        Schema::dropIfExists('articles');
    }
};
