<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LahanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register ', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/home', [MainController::class, 'index'])->name('home');


//     // Lahan URL
    Route::prefix('/lahan')->group(function () {
        Route::get('/', [LahanController::class, 'index'])->name('lahan');
        Route::get('/create', [LahanController::class, 'create']);
        Route::post('/store', [LahanController::class, 'store'])->name('lahan.store');
        Route::get('/edit/{id}', [LahanController::class, 'edit'])->name('lahan.edit');
        Route::post('/edit/{id}', [LahanController::class, 'update'])->name('lahan.update');
        Route::post('/{id}', [LahanController::class, 'destroy'])->name('lahan.destroy');
    });

    // Data Sensor
    Route::prefix('/datasensor')->group(function () {
        Route::get('/grafik', [GrafikController::class, 'grafik']);
        Route::get('/table', [GrafikController::class, 'table']);
    });
});

// // Admin Routes
// Route::prefix('/admin')
//     ->middleware(['auth', 'admin', 'active'])
//     ->group(function () {
//         Route::prefix('/user')->group(function() {
//             Route::get('/', [AdminController::class, 'index'])->name('admin.user');
//             Route::post('/{id}', [AdminController::class, 'approve'])->name('user.approve');
//             Route::post('/d/{id}', [AdminController::class, 'unapprove'])->name('user.unapprove');
//             Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
//             Route::post('/edit/{id}', [AdminController::class, 'update'])->name('user.update');
//         });
//     });

Auth::routes();
