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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('img_path');
            $table->foreignId('article_id')->nullable(false)->index()->constrained('articles');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function(Blueprint $table) {
            $table->dropForeign('images_article_id_foreign');
            $table->dropColumn('article_id');
        });
        Schema::dropIfExists('images');
    }
};
