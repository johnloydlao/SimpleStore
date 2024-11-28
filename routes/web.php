<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::middleware('role:User')->group(function () {
        Route::prefix('cart')->group(function () {
            Route::get('/', [CartController::class, 'view'])->name('cart.view');
            Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        });

        Route::prefix('checkout')->group(function () {
            Route::post('/', [CheckoutController::class, 'checkout'])->name('checkout.store');
            Route::get('/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
            Route::get('/cancel', [CheckoutController::class, 'checkoutCancel'])->name('checkout.cancel');
        });
    });


    Route::middleware('role:Admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users/{id}/promote', [UserController::class, 'promote']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::prefix('products')->group(function () {
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/', [ProductController::class, 'store'])->name('products.store');
        });
    });
});
