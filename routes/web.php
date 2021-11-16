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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/app/{app}', function ($app) {
    if (view()->exists($app)) return view($app);
    return view('error');}
);

Route::fallback(function () {
    return view('error');
});

// Enable react-router-dom to refresh without breaking the app
// Route::view('/{path?}', 'welcome')
// ->where('path', '.*')
// ->name('react');
