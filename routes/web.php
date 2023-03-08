<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts' , AdminPostController::class)->except('show');
//    Route::get('admin/post/', [AdminPostController::class, 'index']);
//    Route::post('admin/post/', [AdminPostController::class, 'store']);
//    Route::get('admin/post/create', [AdminPostController::class, 'create']);
//    Route::get('admin/post/{post}/edit', [AdminPostController::class, 'edit']);
//    Route::patch('admin/post/{post}', [AdminPostController::class, 'update']);
//    Route::delete('admin/post/{post}', [AdminPostController::class, 'destroy']);
});
