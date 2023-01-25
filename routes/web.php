<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


// Route::get('/', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth' , 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/' , [AdminController::class , 'index'])->name('index');
    Route::resource('/restaurant' , CategoryController::class);
    Route::resource('/menu' , MenuController::class);
    Route::resource('/reservation' , ReservationController::class);
    Route::resource('/table' , TableController::class);
    Route::resource('/user' , UserController::class);
});







require __DIR__.'/auth.php';



