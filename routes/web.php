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

Route::get('/admin/users/edit', [
	'uses' 				=> 'UsersController@editUsers',
	'as' 					=> 'backend.users.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

Route::post('/admin/users/update', [
	'uses' 				=> 'UsersController@updateUsers',
	'as' 					=> 'backend.users.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

Route::get('/admin/users', [
	'uses' 				=> 'UsersController@viewUsers',
	'as' 					=> 'backend.users.view',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin','Frontend']
	]);

Route::get('/admin/publica', [
	'uses' 				=> 'UsersController@publica',
	'as' 					=> 'backend.users',
	'middleware' 	=> 'roles',
	'roles'				=>['Frontend']
	]);

#Route::get('/admin/users', 'UsersController@index')->name('users');
#Route::get('/admin/users/assign', 'UsersController@index')->name('admin.assign');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/formulario', 'HomeController@formulario')->name('formulario');

