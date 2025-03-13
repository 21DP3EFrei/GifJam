<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KategorijaController; 
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UnverificationController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategorija;
use Illuminate\Http\Request;
use App\Http\Controllers\GoogleAuthController;

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['admin'])->group(function () {
//Admin routes
// Category routes
Route::get('/categories', [KategorijaController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [KategorijaController::class, 'create'])->name('categories.create');
Route::post('/categories', [KategorijaController::class, 'store'])->name('categories.store');
Route::get('categories/{categories}/edit', [KategorijaController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categories}', [KategorijaController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categories}', [KategorijaController::class, 'destroy'])->name('categories.destroy');

//Verify routes 
Route::get('/verify', [VerificationController::class, 'index'])->name('verification.index');
Route::post('/verify/{media}', [VerificationController::class, 'mediaverify'])->name('verification.mediaverify');

// Unverification routes 
Route::get('/unverify', [UnverificationController::class, 'index'])->name('unverification.index');
Route::post('/unverify/{media}', [UnverificationController::class, 'mediaunverify'])->name('unverification.mediaunverify');

// Subcategory routes
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('/subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');
Route::get('/fetch-subcategories/{categoryId}', [SubCategoryController::class, 'getSubcategories'])->name('fetch.subcategories');

});//end of admin
//Public routes

Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

// Upload routes
Route::get('/upload', [MediaController::class, 'upload'])->name('upload');
Route::post('/upload', [MediaController::class, 'uploadPost'])->name('upload.post');

// gallery
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::post('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/get/subcategories/{category_id}', [PictureController::class, 'getSubcategories'])->name('getSubcategories');
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/pictures/{media}', [PictureController::class, 'show'])->name('pictures.show');
Route::get('/pictures/download/{media}', [PictureController::class, 'download'])->name('pictures.download');
Route::get('/pictures/search', [PictureController::class, 'search'])->name('pictures.search');

//Welcome page
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
}); //end of auth


// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Test route
Route::get('/test', function () {
    return 'This is a test route!';
});
require __DIR__.'/auth.php';