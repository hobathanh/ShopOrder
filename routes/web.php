<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('categories.create');

    Route::post('/store', [\App\Http\Controllers\CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::post('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])
        ->name('categories.update');

    Route::get('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])
        ->name('categories.delete');
});

Route::prefix('menus')->group(function () {
    Route::get('/', [\App\Http\Controllers\MenuController::class, 'index'])
        ->name('menus.index');

    Route::get('/create', [\App\Http\Controllers\MenuController::class, 'create'])
        ->name('menus.create');

    Route::post('/store', [\App\Http\Controllers\MenuController::class, 'store'])
        ->name('menus.store');
});
