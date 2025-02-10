<?php
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiCommentController;

Route::get('/categories', [ApiCategoryController::class, 'index']);
Route::get('/categories/{category}', [ApiCategoryController::class, 'show']);
Route::get('/products', [ApiProductController::class, 'index']);
Route::get('/products/{product}', [ApiProductController::class, 'show']);
Route::post('/comments', [ApiCommentController::class, 'store']);
