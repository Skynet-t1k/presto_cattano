<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
