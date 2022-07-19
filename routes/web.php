<?php

use App\Http\Controllers\Panel\TownHallController;
use App\Http\Controllers\Panel\UserController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::group([
    'prefix' => 'panel',
    'as' => 'panel.',
    'middleware' => ['auth']
], function() {
    //Town-halls
    Route::resource('town-halls', TownHallController::class)->except('show');
    Route::get('town-halls/data', [TownHallController::class, 'data'])->name('town-halls.data');

    //Users
    Route::resource('users', UserController::class)->except('show');
    Route::get('users/data', [UserController::class, 'data'])->name('users.data');
});
