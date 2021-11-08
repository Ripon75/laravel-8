<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

//all category route
Route::resource('categories', CategoryController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();

    return view('dashboard', [
        'users' => $users
    ]);
})->name('dashboard');
