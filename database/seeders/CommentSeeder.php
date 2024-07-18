<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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
            Comment::factory()->count(5)->create([
                'commentable_id' => $article->id,
                'commentable_type' => Article::class,
                'user_id' => $users->random()->id
            ]);
        }

        foreach ($videos as $video) {
            Comment::factory()->count(5)->create([
                'commentable_id' => $video->id,
                'commentable_type' => Video::class,
                'user_id' => $users->random()->id
            ]);
        }

        foreach ($images as $image) {
            Comment::factory()->count(5)->create([
                'commentable_id' => $image->id,
                'commentable_type' => Image::class,
                'user_id' => $users->random()->id
            ]);
        }
    }
}
