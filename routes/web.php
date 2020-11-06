<?php

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

Route::get('/', 'WelcomeController@index');

Route::get('/vehiculos', function () {
    return view('pages.vehiculos');
});

Route::get('/ofertas', function () {
    return view('pages.ofertas');
});

Route::get('/sucursales', function () {
    return view('pages.sucursales');
});

Route::get('/politicas', function () {
    return view('pages.politicas');
});

Route::get('/contacto', function () {
    return view('pages.contacto');
});

/*Route::get('/autos', 'AutoController@index');

Route::get('/autos/create', 'AutoController@create');*/

/** Para crear todas las rutas necesarias para acceder al controlador */
Route::resource('/autos', 'AutoController');

Route::post('carrito/show', 'CarritoController@show');

Route::bind('auto', function($id){
    return App\Models\Auto::where('id', $id)->first();
});

Route::get('carrito/add/{auto}', 'CarritoController@add');

Route::get('carrito/quickdelete/{auto}', 'CarritoController@quickDelete');

Route::get('carrito/delete/{auto}', 'CarritoController@delete');

Route::get('carrito/trash', 'CarritoController@trash');

Route::get('carrito/update/{auto}/{quantity}', 'CarritoController@update');

