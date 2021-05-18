<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\UserController;
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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */
    Route::get('/allusers', [UserController::class, 'index'])->name('user.all');
    Route::get('/adminusers', [UserController::class, 'admin'])->name('user.admin');
    Route::get('/user/{id}', [UserController::class, 'profil'])->name('user.profil');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');


    /*
    |--------------------------------------------------------------------------
    | Restaurants
    |--------------------------------------------------------------------------
    */
    Route::get('/allrestaurants', [RestaurantController::class, 'all'])->name('restaurant.all');
    Route::get('/restaurant/{restaurant}/{id}', [RestaurantController::class, 'profil'])->name('restaurant.profil');
    Route::post('/restaurant/destroy/{id}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
    Route::post('/restaurant', [RestaurantController::class, 'store'])->name('restaurant.store');
    Route::put('/restaurant/update/{id}', [RestaurantController::class, 'update'])->name('restaurant.update');
});