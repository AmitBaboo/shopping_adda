<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/category',[AdminController::class,'category']);

Route::post('/add_category',[AdminController::class,'add_category']);

Route::post('/add_sub_category',[AdminController::class,'add_sub_category']);

Route::get('/show_category',[AdminController::class,'show_category']);

Route::get('/update_category/{id}',[AdminController::class,'update_category']);

Route::post('/update_category_confirm/{id}',[AdminController::class,'update_category_confirm']);

Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

Route::get('/update_sub_category/{id}',[AdminController::class,'update_sub_category']);

Route::post('/update_sub_category_confirm/{id}',[AdminController::class,'update_sub_category_confirm']);

Route::get('/delete_sub_category/{id}',[AdminController::class,'delete_sub_category']);

Route::get('/brand',[AdminController::class,'brand']);

Route::post('/add_brand',[AdminController::class,'add_brand']);

Route::get('/show_brand',[AdminController::class,'show_brand']);

Route::get('/update_brand/{id}',[AdminController::class,'update_brand']);

Route::post('/update_brand_confirm/{id}',[AdminController::class,'update_brand_confirm']);

Route::get('/delete_brand/{id}',[AdminController::class,'delete_brand']);





Route::get('/show_size',[AdminController::class,'show_size']);

Route::get('/size',[AdminController::class,'size']);

Route::post('/add_size',[AdminController::class,'add_size']);

Route::get('/update_size/{id}',[AdminController::class,'update_size']);

Route::post('/update_size_confirm/{id}',[AdminController::class,'update_size_confirm']);

Route::get('/delete_size/{id}',[AdminController::class,'delete_size']);






Route::get('/show_color',[AdminController::class,'show_color']);

Route::get('/color',[AdminController::class,'color']);

Route::post('/add_color',[AdminController::class,'add_color']);

Route::get('/update_color/{id}',[AdminController::class,'update_color']);

Route::post('/update_color_confirm/{id}',[AdminController::class,'update_color_confirm']);

Route::get('/delete_color/{id}',[AdminController::class,'delete_color']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
