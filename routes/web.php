<?php

use App\Http\Controllers\AgendaEventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircularesController;
use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/circulares', [CircularesController::class,'create']);
*/

 Route::resource('circulares', CircularesController::class);
 Route::resource('empleado', EmpleadoController::class);
 Route::resource('eventos',AgendaEventosController::class);

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [AgendaEventosController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [AgendaEventosController::class, 'index'])->name('home');
});