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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address_line_1')->nullable(false);
            $table->string('address_line_2')->nullable();
            $table->char('street_number', 10)->nullable(false);
            $table->char('unit_number', 5)->nullable();
            $table->string('city')->nullable(false);
            $table->string('region')->nullable();
            $table->char('postal_code', 10)->nullable(false);
            $table->unsignedBigInteger('address_country_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->index('address_country_id', 'address_country_idx');

            $table->foreign('address_country_id', 'address_country_fk')->on('countries')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function(Blueprint $table) {
            $table->dropForeign('address_country_fk');
            $table->dropIndex('address_country_idx');
        });
        Schema::dropIfExists('addresses');
    }
};
