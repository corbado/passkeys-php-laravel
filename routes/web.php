<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserAreaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/userarea', [UserAreaController::class, 'userArea'])->name('userArea');
Route::get('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/signup/onboarding', [SignupController::class, 'onboarding'])->name('onboarding');
Route::post('/signup/onboarding', [SignupController::class, 'handleOnboarding'])->name('handleOnboarding');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/api/secret', [ApiController::class, 'secret'])->name('secret');