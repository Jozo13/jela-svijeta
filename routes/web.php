<?php

use App\Http\Controllers\MealController;
use App\Models\Meal;
use Astrotomic\Translatable\Locales;
use Illuminate\Support\Facades\App;
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

Route::get('/meal', [MealController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
