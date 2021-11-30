<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\WebController;
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
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [WebController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/import', [WebController::class, 'import'])->middleware(['auth'])->name('import');

Route::get('/beers', [BeerController::class, 'index'])->middleware(['auth'])->name('beers');

Route::get('/import/beers', [BeerController::class, 'import'])->middleware(['auth'])->name('import.beers');
