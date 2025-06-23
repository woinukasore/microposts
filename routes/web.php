<?php

//use App\Http\Controllers\ProfileController; 元々はコメントではなかったが、Lesson21の最後のほうで湖面アウト
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController; // 追記
use App\Http\Controllers\MicropostsController; //追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MicropostsController::class, 'index']);

Route::get('/dashboard', [MicropostsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]); //追記
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');　使わない
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');　使わない
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');　使わない
    Route::resource('microposts', MicropostsController::class, ['only' => ['store', 'destroy']]);
});

require __DIR__.'/auth.php';
