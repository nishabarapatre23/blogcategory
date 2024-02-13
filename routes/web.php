<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DropdownController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/',[CategoryController::class,'welcome'])->name('welcome');


Route::get('create',[BlogController::class,'create'])->name('create');
Route::post('store',[BlogController::class,'store'])->name('store');
Route::get('table',[BlogController::class,'table'])->name('table');
Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
Route::post('update/{id}',[BlogController::class,'update'])->name('update');
Route::get('delete/{id}',[BlogController::class,'delete'])->name('delete');
Route::get('show/{id}',[BlogController::class,'show'])->name('show');

Route::get('/category/{id}', [BlogController::class,'showByCategory'])->name('blogs.category');



Route::get('category',[CategoryController::class,'category'])->name('category');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/table',[CategoryController::class,'table'])->name('category.table');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
