<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/users/{id}/posts', [UserController::class, 'userPosts']);
Route::get('/posts', [PostController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
