<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = Auth::user();

    if ($user->role_id === 2) {
        return redirect()->route('admin');
    }

    return redirect()->route('profile');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/create', [ApplicationController::class, 'createView'])->middleware('auth')->name('create');
Route::post('/create/store', [ApplicationController::class, 'store'])->name('store')->middleware('auth');

Route::get('/profile', [ApplicationController::class, 'index'])->middleware('auth')->name('profile');
Route::put('/review/create/{id}', [ApplicationController::class, 'review'])->middleware('auth')->name('review');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin');
Route::put('/admin/status-update/{id}', [AdminController::class, 'statusUpdate'])->middleware('admin')->name('adminStatusUpdate');
