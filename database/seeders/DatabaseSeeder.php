<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\Gender;
use App\Models\ImageType;
use App\Models\Size;
use App\Models\SizeScale;
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

        ImageType::create([
            'title' => 'article_img_1'
        ]);
        ImageType::create([
            'title' => 'article_img_2'
        ]);
        ImageType::create([
            'title' => 'article_img_3'
        ]);

        SizeScale::create([
            'title' => 'Regular Collection Scale',
            'slug' => 'regular'
        ]);
        SizeScale::create([
            'title' => 'Plus Collection Scale',
            'slug' => 'plus'
        ]);

        Size::create([
            'slug' => 'xs',
            'scale_id' => '1',
        ]);
        Size::create([
            'slug' => 's',
            'scale_id' => '1',
        ]);
        Size::create([
            'slug' => 'm',
            'scale_id' => '1',
        ]);
        Size::create([
            'slug' => 'l',
            'scale_id' => '1',
        ]);
        Size::create([
            'slug' => 'xl',
            'scale_id' => '1',
        ]);
        Size::create([
            'slug' => 'xxl',
            'scale_id' => '1',
        ]);

        Size::create([
            'slug' => '44',
            'scale_id' => '2',
        ]);
        Size::create([
            'slug' => '46',
            'scale_id' => '2',
        ]);
        Size::create([
            'slug' => '48',
            'scale_id' => '2',
        ]);
        Size::create([
            'slug' => '50',
            'scale_id' => '2',
        ]);
    }
}
