<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ProductController;


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

// shows all products
Route::get('/',[ProductController::class, 'index']);

// show form to create new product
Route::get('/products/create',[ProductController::class, 'create']);

// create new product
Route::post('/products/create',[ProductController::class, 'store']);


// delete a product
//Route::delete('/delete/{id}',[ProductController::class, 'confirm']);
