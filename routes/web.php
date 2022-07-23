<?php

use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\RoleController;
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
    //Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    //Town-halls
    Route::resource('town-halls', TownHallController::class)->only('index');
    Route::resource('town-halls', TownHallController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.town-halls.create');
    Route::resource('town-halls', TownHallController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.town-halls.edit');
    Route::resource('town-halls', TownHallController::class)->only('destroy')->middleware('role_or_permission:admin|panel.town-halls.destroy');
    Route::get('town-halls/data', [TownHallController::class, 'data'])->name('town-halls.data');

    //Users
    Route::resource('users', UserController::class)->only('index')->middleware('role_or_permission:admin|panel.users.index');
    Route::resource('users', UserController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.users.create');
    Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.users.edit');
    Route::resource('users', UserController::class)->only('destroy')->middleware('role_or_permission:admin|panel.users.destroy');
    Route::get('users/data', [UserController::class, 'data'])->name('users.data')->middleware('role_or_permission:admin|panel.users.index');

    //Roles
    Route::resource('roles', RoleController::class)->only('index')->middleware('role_or_permission:admin|panel.roles.index');
    Route::resource('roles', RoleController::class)->only(['create', 'store'])->middleware('role_or_permission:admin|panel.roles.create');
    Route::resource('roles', RoleController::class)->only(['edit', 'update'])->middleware('role_or_permission:admin|panel.roles.edit');
    Route::resource('roles', RoleController::class)->only('destroy')->middleware('role_or_permission:admin|panel.roles.destroy');
    Route::get('roles/data', [RoleController::class, 'data'])->name('roles.data')->middleware('role_or_permission:admin|panel.roles.index');
});
