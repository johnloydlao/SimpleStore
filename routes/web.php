<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes (already handled by `auth.php`)
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::middleware('role:User')->group(function () {
        Route::prefix('cart')->group(function () {
            Route::get('/', [CartController::class, 'view'])->name('cart.view');
            Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        });
    });


    Route::middleware('role:Admin')->group(function () {
        // User management routes (only accessible to admin users)
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/{id}/promote', [UserController::class, 'promote']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::prefix('products')->group(function () {
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/', [ProductController::class, 'store'])->name('products.store');
        });
    });
});
