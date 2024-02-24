<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [ShowController::class, 'index'])->name('show.index');
    Route::post('/', [ShowController::class, 'store']);
    Route::get('/galeri/create',[PostController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [PostController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}', [PostController::class, 'show'])->name('galeri.show');
    Route::delete('/galeri/{id}', [PostController::class, 'destroy'])->name('galeri.destroy');
    Route::get('/galeri/edit/{id}', [PostController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/update/{id}', [PostController::class, 'update'])->name('galeri.update');
    Route::get('/clear-notification', function () {
        session()->forget('show_notification');
    });

    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';
