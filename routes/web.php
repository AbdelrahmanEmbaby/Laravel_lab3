<?php

use Illuminate\Support\Facades\Route;

/*
    if the route is '/posts/{id}'
    and the id is of type string other than 'create'
    the user will be redirected to the fallback route
*/

Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');

Route::get('/posts/{id}', [App\Http\Controllers\PostsController::class, 'show'])
    ->name('posts.show')
    ->where('id', '[0-9]+');

Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');

Route::get('/posts/{id}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');

Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');

Route::put('/posts/{id}', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');

Route::delete('/posts/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.destroy');

// fallback
Route::get('{any}', function () {
    return view('error');
})->where('any', '.*');
