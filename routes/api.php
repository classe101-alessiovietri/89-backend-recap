<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\ContactController;

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

Route::name('api.')->group(function () {

    Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
    Route::get('/songs/{slug}', [SongController::class, 'show'])->name('songs.show');

    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

});
