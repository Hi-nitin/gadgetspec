<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppleSpecController;
use App\Http\Controllers\SamsungSpecController;

// Apple Routes
Route::get('apple_list', [AppleSpecController::class, 'index']); 
Route::get('apple/{name}', [AppleSpecController::class, 'show']); 

// Samsung Routes
Route::get('samsung_list', [SamsungSpecController::class, 'index']); 
Route::get('samsung/{name}', [SamsungSpecController::class, 'show']); 


use App\Http\Controllers\NewsArticleController;

Route::post('add_news', [NewsArticleController::class, 'store']);

Route::get('/news', [NewsArticleController::class, 'index']);
