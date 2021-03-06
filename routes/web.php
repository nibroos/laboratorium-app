<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/biodata', function () {
    return view('biodata');
})->name('biodata');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('labs', LabsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('places', PlacesController::class);
});

Route::post('upload', [UploadController::class, 'store']);

Route::get('/show/{slug}', "PlacesController@show");
Route::get('/edit/{slug}', "PlacesController@edit");

Route::get('/show/{slug}', "LabsController@show");
Route::get('/edit/{slug}', "LabsController@edit");
