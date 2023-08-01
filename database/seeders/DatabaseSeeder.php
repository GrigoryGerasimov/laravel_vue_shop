<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\Gender;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Gender::create([
            'title' => 'male',
            'slug' => 'm'
        ]);
        Gender::create([
            'title' => 'female',
            'slug' => 'f'
        ]);
        Gender::create([
            'title' => 'other',
            'slug' => 'o'
        ]);

        Country::create([
            'title' => 'Germany',
            'iso_alpha_2' => 'DE'
        ]);
        Country::create([
            'title' => 'Great Britain',
            'iso_alpha_2' => 'GB'
        ]);
        Country::create([
            'title' => 'France',
            'iso_alpha_2' => 'FR'
        ]);
    }
}
