<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProfileController;

// Homepage Route (dengan controller)
Route::get('/', [TestimonialController::class, 'homepage'])->name('home');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// Store Testimonial Route (bisa guest & user)
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Authentication Routes for Guests
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile Management - Corrected Route Names
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Subscription Management
    Route::get('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::patch('/subscription/{subscription}/resume', [SubscriptionController::class, 'resume'])->name('subscription.resume');
    Route::post('/subscription', [SubscriptionController::class, 'store'])->name('subscription.store');

    // User Dashboard
    Route::get('/dashboard', [SubscriptionController::class, 'index'])->name('dashboard.user');
    Route::patch('/subscription/{subscription}/pause', [SubscriptionController::class, 'pause'])->name('subscription.pause');
    Route::delete('/subscription/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});
