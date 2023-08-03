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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id')->nullable(false);
            $table->index('address_id', 'user_address_idx');
            $table->foreign('address_id', 'user_address_fk')->on('addresses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('user_address_fk');
            $table->dropIndex('user_address_idx');
            $table->dropColumn('address_id');
        });
    }
};
