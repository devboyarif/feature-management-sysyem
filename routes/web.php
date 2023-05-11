<?php

use App\Http\Controllers\FeatureRequestController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Backend\FeatureRequests;
use App\Models\FeatureRequest;
use Illuminate\Support\Facades\Route;


// Route::get('/test', function () {
//     $feature_request = FeatureRequest::first();
//     $feature_request->update(['vote' => -1]);

//     return $feature_request;
//     $up_count = $feature_request->votes()->where('type','up')->count();
//     $down_count = $feature_request->votes()->where('type','down')->count();

//     return $result = $up_count - $down_count;

//     // return view('home');
// });


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/feature/requests/{project:slug}', [FrontendController::class, 'requests'])->name('feature.requests');
Route::post('/project/selection', [FrontendController::class, 'selectProject'])->name('select.project');
Route::get('/feature/request/index', FeatureRequests::class)->name('feature.request.index');
// Route::get('featureRequests/index', [FeatureRequestController::class, 'index'])->name('feature.request.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
