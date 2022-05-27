<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function(){
    Route::resource('post', PostController::class)->except(['show'])->names('admin.posts');
    Route::resource('category', CategoryController::class)->except(['show'])->names('admin.categories');
    Route::resource('tag', TagController::class)->except(['show'])->names('admin.tags');
    Route::resource('user', UserController::class)->except(['show'])->names('admin.users');
});
