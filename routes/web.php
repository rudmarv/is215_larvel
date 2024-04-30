<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AwsUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/upload', function () {return view('upload');});
Route::get(uri: '/upload', action: [AwsUploadController::class, 'index']);
Route::post(uri: '/upload', action: [AwsUploadController::class, 'store'])->name("upload");
require __DIR__.'/auth.php';
