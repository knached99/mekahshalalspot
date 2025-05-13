<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Manager;
//Route::view('/', 'welcome');

Route::get('/', [Home::class, 'homePage'])->name('/');
Route::get('/about', [Home::class, 'aboutPage'])->name('about');
Route::get('/restaurant-menu', [Home::class, 'restaurantMenu'])->name('restaurant-menu');
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Group all routes that require authentication and email verification
Route::middleware(['auth', 'verified'])->group(function () {
    // Routes that require authentication and email verification
    Route::get('/dashboard', [Manager::class, 'dashboard'])->name('dashboard');
    Route::get('/sections/{section}', [SectionController::class, 'show'])->name('sections.show');
    Route::get('/menu-create', [Manager::class, 'menuCreate'])->name('menu-create');
    Route::get('/menu', [Manager::class, 'displayMenuManager'])->name('menu');
    Route::get('/admin/section/{sectionID}/view', [Manager::class, 'viewSection'])->name('menuEdit');
    Route::delete('/deleteSection/{sectionID}', [Manager::class, 'deleteSection'])->name('deleteSection');
});

// Routes that do not require authentication or email verification
Route::get('/catering', [Home::class, 'cateringPage'])->name('catering');

Route::get('/cart', [Home::class, 'cart'])->name('cart');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
