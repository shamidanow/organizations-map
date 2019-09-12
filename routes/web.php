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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/organizations/showmap', 'OrganizationsController@showMap');

Route::get('/organizations/updatecoords', 'OrganizationsController@updateCoords');

Route::get('/organizations/getcoordsbyaddr/{addr}', 'OrganizationsController@getCoordsByAddr');

Route::get('/organizations/searchs/{name}', 'OrganizationsController@searchs');

Route::get('/organizations/search/{address}/{name}', 'OrganizationsController@search');

Route::get('/organizations/searched', 'OrganizationsController@searched');

Route::resource('/organizations', 'OrganizationsController');

