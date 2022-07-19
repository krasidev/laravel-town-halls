<?php

use App\Http\Controllers\Panel\TownHallController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'panel',
    'as' => 'panel.',
    'middleware' => ['auth']
], function() {
    //Town-halls
    Route::resource('town-halls', TownHallController::class)->except('show');
    Route::get('town-halls/data', [TownHallController::class, 'data'])->name('town-halls.data');
});
