<?php

use App\Http\Controllers\api\ArchiveAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\IndexAPIController;
use App\Http\Controllers\IndexController;

use function Laravel\Prompts\search;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', function () {
    die('Test route works!');
});



Route::post('/indexfetch', [IndexAPIController::class, 'indexFetch']);

Route::post('/archiveunique', [ArchiveAPIController::class, 'archiveUnique']);
Route::post('/archivefetch', [ArchiveAPIController::class, 'archiveFetch']);
Route::post('/archiveget', [ArchiveAPIController::class, 'archiveGet']);




