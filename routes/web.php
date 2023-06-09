<?php

use App\Http\Controllers\AgendaEventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircularesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Empleado;



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

 Route::resource('circulares', CircularesController::class)->middleware('auth');
 Route::resource('empleado', EmpleadoController::class);
 Route::resource('eventos',AgendaEventosController::class)->middleware('auth');
 Route::post('/search',[AgendaEventosController::class,'search'])->name('empleados.search');

 Auth::routes(['register'=>false,'reset'=>false]);

// Route::get('/home', [AgendaEventosController::class, 'index'])->name('home');
//Route::get('/home')->name('principal\index');

Route::post('/postLogin', [LoginController::class,'postLogin'])->name('postLogin');

Route::get('/setuserspassword', function(){ //funcion para encriptar las contraseñas
    $empleados=Empleado::all();
    set_time_limit(0);
    foreach ($empleados as $data){
        $data->password= Hash::make($data->username.'Dif');
        // $data->rol=1;
        $data->update();
    }
    return "etsito";
});

//  Route::group(['middleware' => 'auth'], function () {
//      Route::get('/home', [AgendaEventosController::class, 'index'])->name('home');
//  });


Route::get('/home', function(){

    return view('principal.index');
})->middleware('auth');