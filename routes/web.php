<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
});
  
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {

        Route::middleware('check.category.depth')->group(function () {
            Route::resource('categories', CategoryController::class);
        });


        Route::resource('products', ProductController::class);
        Route::get(
            '/products/{product}/images/{image}/set-main',
            [ProductController::class, 'setMainImage']
        )->name('products.setMainImage');

        Route::get(
            '/products/{product}/images/{image}',
            [ProductController::class, 'deleteImage']
        )->name('products.deleteImage');

        Route::resource('users', UserController::class);
    });

    Route::middleware(['role:admin|moderator'])->group(function () {
        Route::resource('comments', CommentController::class);
    });
});

require __DIR__ . '/auth.php';
