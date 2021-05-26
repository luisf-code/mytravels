<?php

use App\Http\Controllers\Sitio\planescontroller;
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

Route::get('/','App\Http\Controllers\Sitio\planescontroller@InicioController');

Route::get('/planes','App\Http\Controllers\Sitio\planescontroller@PlanesController');

Route::get('/lugares','App\Http\Controllers\Sitio\Lugarescontroller@lugaresController');

Route::get('/query','App\Http\Controllers\Sitio\DestinosController@destinos');

Route::get('/contacto', function () {
    return view('contacto');
});

Route::resource('/crud','App\Http\Controllers\Crud\crudcontroller');

Route::post('/presupuesto','App\Http\Controllers\Sitio\planescontroller@PresupuestoController') -> where(['dinero' => '[0-9]+']);

Route::get('/crud/numerico/{url}','App\Http\Controllers\Crud\crudcontroller@numerico') -> where(['url' => '[0-9]+']); //url es dinamica, le dije que solo recibe valores númericos ahí con ese where
//Route::get('/crud/numerico/{url}/{url2}','App\Http\Controllers\Crud\crudcontroller@numerico') -> where(['url' => '[0-9]+','url2' => '[0-9]+']); -> para varias variables dinamicas

// Route::get('planes/{recorridos}',[planescontroller::class, "show"])->name('planes.show');

Route::get('planes/tours/{recorridos}','App\Http\Controllers\Sitio\planescontroller@show');
Route::post('/planes/tours/show','App\Http\Controllers\Sitio\planescontroller@storeTours');

Route::get('planes/{recorridos}','App\Http\Controllers\Sitio\planescontroller@showPlanes');
Route::post('/planes/show','App\Http\Controllers\Sitio\planescontroller@storePlanes');

Route::get('/encrypt','App\Http\Controllers\Crud\crudcontroller@encrypt1');
Route::get('/decrypt','App\Http\Controllers\Crud\crudcontroller@decrypt1');
