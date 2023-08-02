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
            $table->string('first_name')->nullable(false);
            $table->string('middle_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->integer('age')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable(false);
            $table->string('address_line_1')->nullable(false);
            $table->string('address_line_2')->nullable();
            $table->char('street_number', 10)->nullable(false);
            $table->char('unit_number', 5)->nullable();
            $table->string('city')->nullable(false);
            $table->string('region')->nullable();
            $table->char('postal_code', 10)->nullable(false);
            $table->unsignedBigInteger('country_id')->nullable(false);

            $table->index('gender_id', 'user_gender_idx');
            $table->index('country_id', 'user_country_idx');

            $table->foreign('gender_id', 'user_gender_fk')->on('genders')->references('id');
            $table->foreign('country_id', 'user_country_fk')->on('countries')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('user_gender_fk');
            $table->dropForeign('user_country_fk');

            $table->dropIndex('user_gender_idx');
            $table->dropIndex('user_country_idx');

            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('age');
            $table->dropColumn('address_line_1');
            $table->dropColumn('address_line_2');
            $table->dropColumn('street_number');
            $table->dropColumn('unit_number');
            $table->dropColumn('city');
            $table->dropColumn('region');
            $table->dropColumn('postal_code');
        });
    }
};
