<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

// Posts

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Comments

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments.index');

Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('posts.comments.create');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');

//  dynamic posts

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//  dynamic comments

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');

Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');

Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Create a new route to view page.
// Create view to view information of the website.
// Create controller to hold system logic.
// Create an action method in controller for each route.
// No static data.
