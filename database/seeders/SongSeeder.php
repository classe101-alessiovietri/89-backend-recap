<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Song;

// Helpers
use Illuminate\Support\Facades\Storage;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::truncate();

        if (Storage::disk('public')->exists('uploads/songs')) {
            Storage::disk('public')->deleteDirectory('uploads/songs');
        }
        Storage::disk('public')->makeDirectory('uploads/songs');

        for ($i = 0; $i < 30; $i++) {
            $title = fake()->words(rand(1, 6), true);
            $slug = str()->slug($title);

            $imgPath = null;
            if (fake()->boolean()) {
                $imgPath = fake()->image(storage_path('app/public/uploads/songs'), 480, 480, 'music', false);
                if ($imgPath && $imgPath != '') {
                    $imgPath = 'uploads/songs/'.$imgPath;
                }
                else {
                    $imgPath = null;
                }
            }

            Song::create([
                'title' => $title,
                'slug' => $slug,
                'duration' => rand(60, 420),
                'is_single' => fake()->boolean(),
                'cover_img' => $imgPath,
            ]);
        }
    }
}
