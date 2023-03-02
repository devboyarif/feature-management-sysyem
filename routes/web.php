<?php

use App\Http\Controllers\ProfileController;
use App\Models\FeatureRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {


    $feature_request = FeatureRequest::first();
    $feature_request->update(['vote' => -1]);

    return $feature_request;
    $up_count = $feature_request->votes()->where('type','up')->count();
    $down_count = $feature_request->votes()->where('type','down')->count();

    return $result = $up_count - $down_count;

    // return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
