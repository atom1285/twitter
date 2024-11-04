<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/profile', [ProfileController::class, 'index']);

// posts
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

// comments
Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');

// auth
Route::get('/register', [AuthController::class, 'register'])->name('register.register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('login.logout');
