<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show'); // Carga de resultados al buscar.
Route::get('/products/json', 'SearchController@data'); // Trae resultados en un Json.

Route::get('/home', 'HomeController@index')->name('home'); // Carga el home.
Route::get('/products/{id}', 'ProductController@show'); // Mostrará el producto dependiendo del id que le pasemos.
Route::get('/cart/cant', 'CartDetailController@cantidad');	
Route::get('/categories/{category}', 'CategoryController@show'); // Mostrará la categoría dependiendo del id que le pasemos.

Route::post('/cart', 'CartDetailController@store'); // Almacenamiento del carrito de compras.
Route::delete('/cart', 'CartDetailController@destroy'); // Destrucción del carrito de compras.

Route::delete('/deleteOrder', 'OrdersController@destroy'); // Destrucción del carrito de compras.
Route::put('/order', 'CartController@update'); // Realizar pedido del carrito de compras.
Route::get('/gmail', 'OrdersController@store'); // Vuelca datos en la tabla para recuperar pedidos pendientes.

//Route::get('/payment', 'Payment@index'); // pago del cliente

//Route::post('/subscribe', 'Payment@subscribe'); // subscripción a plan

//Route::get('/changeplan', 'Payment@changeplan'); // cambio de plan

Route::get('/email', 'EmailController@questions'); // cambio de plan

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')
->group(function () {

	Route::get('/checked', 'OrdersController@checked');	
	Route::get('/count', 'OrdersController@counts');
	Route::get('/orders', 'OrdersController@index'); // listado
	Route::get('/products', 'ProductController@index'); // listado
	Route::get('/products/create', 'ProductController@create'); // formulario
	Route::post('/products', 'ProductController@store'); // registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edición
	Route::post('/products/{id}/edit', 'ProductController@update'); // actualizar
	Route::delete('/products/{id}', 'ProductController@destroy'); // form eliminar
	
	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // registrar
	Route::post('/portada/images', 'ImageController@portada'); // registrar
	Route::post('/carousel/images', 'ImageController@carousel'); // registrar
	Route::get('/portada/show', 'ImageController@showPortada'); // registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // form eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar

	Route::get('/categories', 'CategoryController@index'); // listado
	Route::get('/categories/create', 'CategoryController@create'); // formulario
	Route::post('/categories', 'CategoryController@store'); // registrar
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edición
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualizar
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // form eliminar
});
