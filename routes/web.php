<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\KategorijaController; 
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\UnverificationController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SoundCategoryController;
use App\Http\Controllers\NobloketsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MusicLibrary;
use App\Http\Controllers\SoundLibrary;
use App\Http\Controllers\LikeController;

Route::get('locale/{lang}', [LocalizationController::class, 'selected']);
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::middleware(['auth', 'verified', 'blocked'])->group(function () {

//Admin routes
Route::middleware(['admin'])->group(function () {

// Category routes
Route::get('/categories', [KategorijaController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [KategorijaController::class, 'create'])->name('categories.create');
Route::post('/categories', [KategorijaController::class, 'store'])->name('categories.store');
Route::get('categories/{categories}/edit', [KategorijaController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categories}', [KategorijaController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categories}', [KategorijaController::class, 'destroy'])->name('categories.destroy');

//Sound category routes
Route::get('/sound-categories', [SoundCategoryController::class, 'index'])->name('sound-categories.index');
Route::get('/sound-categories/create', [SoundCategoryController::class, 'create'])->name('sound-categories.create');
Route::post('/sound-categories', [SoundCategoryController::class, 'store'])->name('sound-categories.store');
Route::get('sound-categories/{SoundCategory}/edit', [SoundCategoryController::class, 'edit'])->name('sound-categories.edit');
Route::put('/sound-categories/{SoundCategory}', [SoundCategoryController::class, 'update'])->name('sound-categories.update');
Route::delete('/sound-categories/{SoundCategory}', [SoundCategoryController::class, 'destroy'])->name('sound-categories.destroy');

//Genre routes
Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/create', [GenreController::class, 'create'])->name('genre.create');
Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');
Route::get('genre/{genre}/edit', [GenreController::class, 'edit'])->name('genre.edit');
Route::put('/genre/{genre}', [GenreController::class, 'update'])->name('genre.update');
Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

//Verify routes 
Route::get('/verify', [VerificationController::class, 'index'])->name('verification.index');
Route::post('/verify/{media}', [VerificationController::class, 'mediaverify'])->name('verification.mediaverify');
Route::get('/verify/{media}/edit', [VerificationController::class, 'editMedia'])->name('verification.edit');
Route::put('/verify/{media}', [VerificationController::class, 'update'])->name('verification.update');

// Unverification routes 
Route::get('/unverify', [UnverificationController::class, 'index'])->name('unverification.index');
Route::post('/unverify/{media}', [UnverificationController::class, 'mediaunverify'])->name('unverification.mediaunverify');
Route::get('/unverify/{media}/edit', [UnverificationController::class, 'editMedia'])->name('unverification.edit');
Route::put('/unverify/{media}', [UnverificationController::class, 'update'])->name('unverification.update');

//Blocking routes
Route::get('/block', [NobloketsController::class, 'index'])->name('block.index');
Route::get('/block/create', [NobloketsController::class, 'create'])->name('block.create');
Route::post('/block', [NobloketsController::class, 'store'])->name('block.store');
Route::get('block/{block}/edit', [NobloketsController::class, 'edit'])->name('block.edit');
Route::put('/block/{block}', [NobloketsController::class, 'update'])->name('block.update');
Route::delete('/block/{block}', [NobloketsController::class, 'destroy'])->name('block.destroy');
Route::post('/block/create/{user}', [NobloketsController::class, 'specific'])->name('block.specific');
});//end of admin

//Public routes
//Pdf
Route::post('users/view/pdf', [ProfileController::class, 'viewPDF'])->name('view.pdf');
Route::post('users/download/pdf', [ProfileController::class, 'downloadPDF'])->name('download.pdf');
Route::delete('/user/{user}', [ProfileController::class, 'destroyNoPassword'])->name('user.destroy');

// Upload routes
Route::middleware(['realCategory'])->group(function () {
Route::get('/upload/Image', [MediaController::class, 'ImageUpload'])->name('Image.upload');
Route::post('/upload/Image', [MediaController::class, 'uploadImage'])->name('upload.Image');
Route::get('/upload/Music', [MediaController::class, 'MusicUpload'])->name('Music.upload');
Route::post('/upload/Music', [MediaController::class, 'uploadMusic'])->name('upload.Music');
Route::get('/upload/Sound', [MediaController::class, 'SoundUpload'])->name('Sound.upload');
Route::post('/upload/Sound', [MediaController::class, 'uploadSound'])->name('upload.Sound');
});

//Media routes
Route::get('/likedImages', [LikeController::class, 'images'])->name('likesP')->middleware('like');
Route::get('/likedSounds', [LikeController::class, 'sounds'])->name('likesS')->middleware('like');
Route::get('/likedMusic', [LikeController::class, 'music'])->name('likesM')->middleware('like');
Route::post('/media/{media}/like', [LikeController::class, 'like'])->name('media.like');
Route::post('/media/{media}/unlike', [LikeController::class, 'unlike'])->name('media.unlike');

//gallery
Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
Route::get('/get/subcategories/{category_id}', [PictureController::class, 'getSubcategories'])->name('getSubcategories');
Route::get('/pictures/search', [PictureController::class, 'search'])->name('pictures.search');

//sound library
Route::get('/sounds', [SoundLibrary::class, 'index'])->name('sounds.index');
Route::get('/get/soundSubCategories/{sound_category_id}', [SoundLibrary::class, 'getSubcategories'])->name('getSoundSubCategories');
Route::get('/sounds/search', [SoundLibrary::class, 'search'])->name('sounds.search');

//music library
Route::get('/music', [MusicLibrary::class, 'index'])->name('music.index');
Route::get('/get/genre/{genre_id}', [MusicLibrary::class, 'getSubgenres'])->name('getSubgenre');
Route::get('/music/search', [MusicLibrary::class, 'search'])->name('music.search');

//download route
Route::get('/media/download/{media}', [MediaController::class, 'download'])->name('media.download');

//show media
Route::get('/media/{media}', [MediaController::class, 'show'])->name('media.show')->middleware('media');

//error pages
Route::get('/blocked', function () {return view('block');})->name('block');

//random media
Route::get('/random', [MediaController::class, 'random'])->name('random')->middleware('randomExists');

//Welcome page
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
}); //end of auth and blocked

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

//misc 
Route::get('/crazy', function () {
    return response()->file(public_path('crazy.mp4'));
})->name('crazy');
Route::get('/me', function () {
    return redirect()->to('https://www.youtube.com/@Epic_brawler_Gaming');
});

// Test route
Route::get('/test', function () {
    return 'This is a test route!';
});

require __DIR__.'/auth.php';