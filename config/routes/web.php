<?php

/**
 * --------------------------------------------------------------------------
 * Routes
 * --------------------------------------------------------------------------
 * 
 * Here is where you can register routes for your application.
 * Now create something great!
 * 
 */

use App\Core\Routing\Route;

Route::get('/', function () {
    $pageTitle = "Welcome";
    return view('/welcome', compact('pageTitle'));
});

Route::get('/home', ['WelcomeController@home', ['auth']]);

Route::get('/crud', ['CrudController@index', ['auth']]);
Route::post('/crud_add', ['CrudController@store', ['auth']]);
Route::get('/crud_edit/{id}', ['CrudController@edit', ['auth']]);
Route::post('/crud_update', ['CrudController@update', ['auth']]);
Route::post('/crud_delete', ['CrudController@deleteItem', ['auth']]);
