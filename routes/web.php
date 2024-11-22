<?php

use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\Editorial_board;
use App\Http\Controllers\Editorial_boardController;
use App\Http\Controllers\IndexController;

// Main Page Route
// Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

// Indexing
Route::get('indexing', [IndexController::class, "index"])->name("index-home")->middleware('auth');
Route::get('indexing/create', [IndexController::class, "create"])->name('index-create')->middleware('auth');
Route::post('indexing/store', [IndexController::class, "store"])->name('index-store')->middleware('auth');
Route::delete('indexing/{id}', [IndexController::class, "destroy"])->name('index-delete')->middleware('auth');
Route::put('indexing/{id}/toggle', [IndexController::class, 'toggleStatus'])->name('indexing.toggle')->middleware('auth');


// Editorial
Route::get('editorial', [Editorial_boardController::class, "index"])->name("editorial-home")->middleware('auth');
Route::get('editorial/create', [Editorial_boardController::class, "create"])->name("editorial-create")->middleware('auth');
Route::post('editorial/store', [Editorial_boardController::class, "store"])->name('editorial-store')->middleware('auth');
Route::put('editorial/edit/{id}', [Editorial_boardController::class, "edit"])->name('editorial-edit')->middleware('auth');
Route::put('editorial/update/{id}', [Editorial_boardController::class, "update"])->name('editorial-update')->middleware('auth');
Route::delete('editorial/{id}', [Editorial_boardController::class, "destroy"])->name('editorial-delete')->middleware('auth');


// Archives
Route::get('archives', [ArchivesController::class, "index"])->name("archives-home")->middleware('auth');
Route::get('archives/create', [ArchivesController::class, "create"])->name("archives-create")->middleware('auth');
Route::post('archives/store', [ArchivesController::class, "store"])->name('archives-store')->middleware('auth');
Route::get('archives/edit/{id}', [ArchivesController::class, "edit"])->name('archives-edit')->middleware('auth');
Route::put('archives/update/{id}', [ArchivesController::class, "update"])->name('archives-update')->middleware('auth');
Route::delete('archives/{id}', [ArchivesController::class, "destroy"])->name('archives-delete')->middleware('auth');
Route::get('archives/download/{id}', [ArchivesController::class, "download"])->name('archives-download')->middleware('auth');
Route::get('archives/view/{id}', [ArchivesController::class, 'viewPDF'])->name('archives-view')->middleware('auth');
// authentication 
Route::get('register',[AuthController::class,"index"])->name("register")->middleware('guest');
Route::post('register/store',[AuthController::class,"store"])->name("register-store");
Route::get('/',[AuthController::class,"login"])->name("login")->middleware('guest');
Route::get('login/show',[AuthController::class,"login_fetch"])->name("login-show");
Route::get('logout',[AuthController::class,"logout"])->name("logout");


Route::get('archives/{filename}', function ($filename) {
    $path = storage_path('app/public/archives/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    }

    return abort(404);
});

Route::get('/templates/{filename}', function ($filename) {
    $path = storage_path('app/public/templates/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});



