<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Middleware\user;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
        } else {
            return redirect()->route('user-dashboard');
        }
    })->name('dashboard');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('Admindashboard');

    Route::get('/app', function () {
        return view('admin.applicant');
    })->name('app');

    Route::get('/add-applicant', function () {
        return view('admin.add-applicant');
    })->name('add-applicant');

    Route::get('/benefits', function () {
        return view('admin.benefits');
    })->name('benefits');

    Route::get('/applicants-documents', function () {
        return view('admin.applicants-documents');
    })->name('app-d');

    Route::get('/add-staff', function () {
        return view('admin.add-staff');
    })->name('add-s');



});

// User routes
Route::prefix('user')->middleware(['auth', user::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user-dashboard');

    Route::get('/applicants', function () {
        return view('user.applicant');
    })->name('applicant');

    Route::get('/requirements-form', function () {
        return view('user.requirements-form');
    })->name('req');




});

// Profile route
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
require __DIR__.'/auth.php';
