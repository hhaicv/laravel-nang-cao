<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use App\Models\Rating;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $videos = Video::all();
        $images = Image::all();
        $users = User::all();

        foreach ($articles as $article) {
            Rating::factory()->count(5)->create([
                'rateable_id' => $article->id,
                'rateable_type' => Article::class,
                'user_id' => $users->random()->id,
                'rating' => rand(1, 5)
            ]);
        }

        foreach ($videos as $video) {
            Rating::factory()->count(5)->create([
                'rateable_id' => $video->id,
                'rateable_type' => Video::class,
                'user_id' => $users->random()->id,
                'rating' => rand(1, 5)
            ]);
        }

        foreach ($images as $image) {
            Rating::factory()->count(5)->create([
                'rateable_id' => $image->id,
                'rateable_type' => Image::class,
                'user_id' => $users->random()->id,
                'rating' => rand(1, 5)
            ]);
        }
    }
}
