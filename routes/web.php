<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemController;
use App\Http\Controllers\KategorijaController; 
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UnverificationController;
use App\Http\Controllers\PictureController;
use app\http\Controllers\DownloadController;
use app\http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

//upload routes
Route::get('/upload', [MemController::class, 'upload'])->name('upload');
Route::post('/upload', [MemController::class, 'uploadPost'])->name('upload.post');

//category routes
Route::get('/categories', [KategorijaController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [KategorijaController::class, 'create'])->name('categories.create');
Route::post('/categories', [KategorijaController::class, 'store'])->name('categories.store');
Route::get('/categories/{kategorija}', [KategorijaController::class, 'show'])->name('categories.show');
Route::get('categories/{kategorija}/edit', [KategorijaController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{kategorija}', [KategorijaController::class, 'update'])->name('categories.update');
Route::delete('/categories/{kategorija}', [KategorijaController::class, 'destroy'])->name('categories.destroy');

//verify

Route::get('/verify', [VerificationController::class, 'index'])->name('verification.index');
Route::post('/verify/{mem}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/unverify', [UnverificationController::class, 'index'])->name('unverification.index');
Route::post('/unverify/{mem}', [UnverificationController::class, 'unverify'])->name('unverification.unverify');


//picture
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/pictures/{mem}', [PictureController::class, 'show'])->name('pictures.show');
Route::get('/pictures/{mem}/download', [PictureController::class, 'download'])->name('pictures.download');
Route::post('/download/save', [DownloadController::class, 'saveDownload'])->name('download.save');


//subcategories
Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/{subcategory}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('/subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');
Route::get('/fetch-subcategories/{categoryId}', [SubcategoryController::class, 'getSubcategories'])->name('fetch.subcategories');


//upload
Route::post('/upload', [MemController::class, 'uploadPost'])->name('upload.post');
Route::get('/test', function () {
    return 'This is a test route!';
});

//gallery
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');

//mem
// Default route redirects to the home page
Route::get('/', function () {
    return Redirect::to('http://127.0.0.1:5500/api/resources/views/home%20page/Home.html');
});

// Registration page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// After login, users are redirected to the welcome page
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    });
    
    // Access to the dashboard is restricted to authenticated users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Access to the home page is restricted to admin users
Route::get('/home', [AdminController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
