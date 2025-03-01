<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KategorijaController; 
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UnverificationController;
use App\Http\Controllers\PictureController;
use app\http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategorija;
use Illuminate\Http\Request;

//upload routes
Route::get('/upload', [MediaController::class, 'upload'])->name('upload');
Route::post('/upload', [MediaController::class, 'uploadPost'])->name('upload.post');

//category routes
Route::get('/categories', [KategorijaController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [KategorijaController::class, 'create'])->name('categories.create');
Route::post('/categories', [KategorijaController::class, 'store'])->name('categories.store');
Route::get('categories/{categories}/edit', [KategorijaController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categories}', [KategorijaController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categories}', [KategorijaController::class, 'destroy'])->name('categories.destroy');

//verify

Route::get('/verify', [VerificationController::class, 'index'])->name('verification.index');
Route::post('/verify/{media}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/unverify', [UnverificationController::class, 'index'])->name('unverification.index');
Route::post('/unverify/{media}', [UnverificationController::class, 'unverify'])->name('unverification.unverify');


//picture
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/pictures/{media}', [PictureController::class, 'show'])->name('pictures.show');
Route::get('/pictures/download/{media}', [PictureController::class, 'download'])->name('pictures.download');
Route::get('/pictures/search', [PictureController::class, 'search'])->name('pictures.search');


//subcategories
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('/subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');
Route::get('/fetch-subcategories/{categoryId}', [SubcategoryController::class, 'getSubcategories'])->name('fetch.subcategories');


//test
Route::get('/test', function () {
    return 'This is a test route!';
});

//gallery
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');

//home
route::get('/', function () {    
    return view('home');
} )->name('home');


// Registration page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// After login, users are redirected to the welcome page
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
    
});

Route::get('/home', [AdminController::class, 'index']);
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');