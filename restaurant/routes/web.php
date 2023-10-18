<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);

Route::get('/users', [AdminController::class, 'users']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);
Route::get('/update_view/{id}', [AdminController::class, 'update_view']);
Route::get('/updatechef/{id}', [AdminController::class, 'updatechef']);
Route::get('/reservation_list', [AdminController::class, 'reservation_list']);
Route::get('/viewchef', [AdminController::class, 'viewchef']);
Route::get('/delete_chef/{id}', [AdminController::class, 'delete_chef']);

Route::post('/update_chef/{id}', [AdminController::class, 'update_chef']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']);
Route::post('/update_food/{id}', [AdminController::class, 'update_food']);
Route::post('/uploadfood', [AdminController::class, 'uploadfood']);
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
