<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WeatherController@index');
Route::get('spot/{id}', 'WeatherController@show');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('spots', 'Admin\Spots\SpotsController')->middleware(['auth']);
Route::match(['get', 'post'], '/spots/link', 'Admin\Spots\SpotsController@link')->middleware(['auth'])->name('spots.link');
Route::resource('cameras', 'Admin\Cameras\CamerasController')->middleware(['auth']);

require __DIR__.'/auth.php';
