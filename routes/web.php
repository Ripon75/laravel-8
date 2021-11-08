<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

//category route
Route::resource('categories', CategoryController::class);

//brand route
Route::resource('brands', BrandController::class);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();

    return view('dashboard', [
        'users' => $users
    ]);
})->name('dashboard');
