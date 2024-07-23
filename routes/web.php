<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     Route('order', )
// yêu cầu 1: Lấy tất cả các bình luận của một bài viết cụ thể (article id=1)
// $article = Article::find(1);
// $comments = $article->comments;
// dd($comments);

// yêu cầu 2: Lấy tất cả các đánh giá của một video cụ thể (video id=2)
// $video = Video::find(2);
// $ratings = $video->ratings;
// dd($ratings);

// yêu cầu 3: Lấy tất cả các bình luận của một người dùng cụ thể (user id=3)
// $userId = 3; // Thay bằng user_id cụ thể
// $comments = Comment::where('user_id', $userId)->get();
// dd($comments);

// yêu cầu 4: Lấy trung bình đánh giá của một bài viết cụ thể (article id=4)
// $article = Article::find(4);
// $averageRating = $article->ratings()->avg('rating');
// dd($averageRating);

// yêu cầu 5:  Lấy tất cả các bài viết, video, và hình ảnh được bình luận bởi một người dùng cụ thể (user id=5)
// $userId = 5; // Thay bằng user_id cụ thể
// $comments = Comment::where('user_id', $userId)->get();

// $articles = $comments->filter(function ($comment) {
//     return $comment->commentable_type == 'App\Models\Article';
// })->map(function ($comment) {
//     return $comment->commentable;
// });

// $videos = $comments->filter(function ($comment) {
//     return $comment->commentable_type == 'App\Models\Video';
// })->map(function ($comment) {
//     return $comment->commentable;
// });

// $images = $comments->filter(function ($comment) {
//     return $comment->commentable_type == 'App\Models\Image';
// })->map(function ($comment) {
//     return $comment->commentable;
// });

// dd($articles, $videos, $images);

// yêu cầu 6: Lấy danh sách các bài viết, video, và hình ảnh có đánh giá trung bình cao nhất.

// $topRatedArticles = Article::with(['ratings' => function($query) {
//     $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
//           ->groupBy('rateable_id')
//           ->orderBy('average_rating', 'desc')
//           ->take(5);
// }])->get();

// $topRatedVideos = Video::with(['ratings' => function($query) {
//     $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
//           ->groupBy('rateable_id')
//           ->orderBy('average_rating', 'desc')
//           ->take(5);
// }])->get();

// $topRatedImages = Image::with(['ratings' => function($query) {
//     $query->select(DB::raw('rateable_id, AVG(rating) as average_rating'))
//           ->groupBy('rateable_id')
//           ->orderBy('average_rating', 'desc')
//           ->take(5);
// }])->get();

// dd($topRatedArticles, $topRatedImages, $topRatedVideos);
// });
// Route::resource('article', ArticleController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('orders')
    ->as('orders.')
    ->group(function () {
        Route::get('/',                 [OrderController::class, 'index'])->name('index');
        Route::get('{id}/create',            [OrderController::class, 'create'])->name('create');
        Route::post('store',            [OrderController::class, 'store'])->name('store');
    });
Route::resource('stocks', StockController::class);
