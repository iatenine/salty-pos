<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientsController;

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


Route::resource('/ingredients', IngredientsController::class);

// Enable react-router-dom to refresh without breaking the app
Route::view('/{path?}', 'welcome')
->where('path', '.*')
->name('react');
