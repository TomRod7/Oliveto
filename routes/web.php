<?php

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

Route::get('/', 'HomeController@welcome');
Route::get('/quienes', 'HomeController@mostrar');
Route::get('/contacto', 'ContactController@show');
Route::post('/contacto', 'ContactController@sendMail');

Auth::routes();

Route::get('/products', 'ProductController@index');

Route::get('/carrito', 'CarritoController@index');
Route::post('/carrito', 'CarritoController@sendMail');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function() {
  Route::get('/products', 'ProductController@index'); //listado de productos
  Route::get('/products/create', 'ProductController@create'); //formulario productos
  Route::post('/products', 'ProductController@store'); //registrar productos
  Route::get('/products/{id}/edit', 'ProductController@edit'); // editar formulario productos
  Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar productos
  Route::post('/products/{id}/delete', 'ProductController@destroy'); // eliminar productos

  Route::get('/products/{id}/images', 'ImageController@index');
  Route::post('/products/{id}/images', 'ImageController@store');
  Route::delete('/products/{id}/images', 'ImageController@destroy');
  Route::get('/products/{id}/images', 'ImageController@index'); //destaca imagen

  Route::get('/categories', 'CategoryController@index'); //listado de categorias
  Route::get('/categories/create', 'CategoryController@create'); //formulario categorias
  Route::post('/categories', 'CategoryController@store'); //registrar categorias
  Route::get('/categories/{id}/edit', 'CategoryController@edit'); // editar formulario categorias
  Route::post('/categories/{id}/edit', 'CategoryController@update'); //actualizar categorias
  Route::post('/categories/{id}/delete', 'CategoryController@destroy'); // eliminar categorias
});
