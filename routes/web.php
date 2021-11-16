<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\UserEventController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

//category route
Route::resource('categories', CategoryController::class);

//brand route
Route::resource('brands', BrandController::class);

//Multiple image route
Route::resource('multiImage', ImageController::class);

//event route
Route::get('event', [UserEventController::class, 'index']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();

    return view('dashboard', [
        'users' => $users
    ]);
})->name('dashboard');
