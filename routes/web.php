<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/single/{post}', SingleController::class)->name('single');
Route::post('/single/{post}/comment', [SingleController::class, 'comment'])
    ->middleware('auth:web')->name('single.comment');

Auth::routes();
