<?php

use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('site.home');
Route::get('/recent-updates', [PageController::class, 'recentUpdates'])->name('site.recent-updates');
Route::post('/contact', [ContactController::class, 'store'])->name('site.contact.store');
Route::get('/{slug}', [PageController::class, 'show'])->name('site.page');
