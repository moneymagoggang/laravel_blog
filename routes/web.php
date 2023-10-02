<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

require __DIR__ . '/auth.php';

Route::get('/', [\App\Http\Controllers\PostController::class,'index'])->name('post.index');
//Route::get('/', [\App\Http\Controllers\PostController::class,'index'])->name('home.index');

Auth::routes();



//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('posts/')
    ->name('post.')
    ->group(function () {
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create');
        Route::post('', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
        Route::get('/{post}/view', [\App\Http\Controllers\PostController::class, 'show'])->name('show');
    });

//Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
//Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
//Route::get('/posts/{post}/view', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/plans', [\App\Http\Controllers\Stripe\StripeController::class, 'index'])->name('plans');
Route::get('/plans/success', [\App\Http\Controllers\Stripe\StripeController::class, 'success'])->name('success');
Route::get('/plans/cancel', [\App\Http\Controllers\Stripe\StripeController::class, 'cancel'])->name('cancel');
Route::get('/plans/checkout', [\App\Http\Controllers\Stripe\StripeController::class, 'checkout'])->name('checkout');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('post.search');

Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');


Route::post('/posts/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

//Route::get('/posts/{postId}/comments', [\App\Http\Controllers\CommentController::class, 'show'])->name('comments.show');


Route::get('/posts/tag/{post}', [\App\Http\Controllers\PostController::class, 'postsByTag'])->name('posts.by.tag');



Route::get('posts/my-posts', [\App\Http\Controllers\MyPostController::class, 'index'])->name('my-posts');
Route::get('posts/my-posts/{post}/edit', [\App\Http\Controllers\MyPostController::class, 'edit'])->name('my-posts.edit');
Route::put('posts/my-posts/{post}',[ \App\Http\Controllers\MyPostController::class, 'update'])->name('my-posts.update');
Route::put('/search-posts',[ \App\Http\Controllers\SearchController::class, 'searchPosts'])->name('search-posts');









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
