<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Publico\BlogController;
use App\Http\Controllers\Publico\LoginController;

use App\Http\Controllers\Publico\CommentController;

Route::get('/', [BlogController::class, 'welcome_index'])->name('public.welcome.index');
Route::group(['prefix' => 'inicio'], function(){
    Route::get('publicaciones', [BlogController::class, 'post_index'])->name('public.post.index');
    Route::get('publicaciones/{post:slug}', [BlogController::class, 'blog_show'])->name('public.blog.show');
    Route::get('temas', [BlogController::class, 'topic_index'])->name('public.topic.index');
    Route::get('temas/{tag:slug}', [BlogController::class, 'topic_show'])->name('public.topic.show');
    Route::get('categorias', [BlogController::class, 'category_index'])->name('public.category.index');
    Route::get('categorias/{category:slug}', [BlogController::class, 'category_show'])->name('public.category.show');

    Route::get('iniciar', [LoginController::class, 'login_index'])->name('public.login.index');
    Route::post('iniciar', [LoginController::class, 'login_store'])->name('public.login.store');
    Route::get('crear', [LoginController::class, 'register_index'])->name('public.register.index');
    Route::post('crear', [LoginController::class, 'register_store'])->name('public.register.store');
    Route::get('cerrar', [LoginController::class, 'logout'])->name('logout');

    Route::resource('publicaciones/comment', CommentController::class)->except(['index', 'show', 'edit'])->names('public.comment');
});


Route::get('/clear', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('view:clear');
    $run = Artisan::call('route:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('optimize');
    return 'Limpieza del Sistema Terminada con exito';
});
Route::get('/local', function(){
    Artisan::call('storage:link');
    return 'La carpeta storage se a cheado con exito';
});

Route::get('/server', function(){

    if (file_exists(public_path('storage'))) {
        return "La carpeta Storage ya existe";
    }

    app('files')->link(
        storage_path('app/public'), public_path('storage')
    );
    return 'La carpeta storage se a cheado con exit.';
});
