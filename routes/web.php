<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// use App\Http\Controllers\ImageUploadController;

// Route::get('image-upload', [ImageUploadController::class, 'index']);
// Route::post('image-upload', [ImageUploadController::class, 'store'])->name('image.store');


// routes/web.php
// routes/web.php

// Route to display the view (GET)
Route::get('/image-upload-page', function () {
    return view('image-crop');
})->name('image.upload.page');

// Route to handle the image upload (POST)
Route::post('/image-upload', [ImageController::class, 'upload'])->name('image.upload');


