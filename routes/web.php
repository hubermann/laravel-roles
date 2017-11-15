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


Auth::routes();

Route::group(['prefix' => 'backend'], function(){
	//Root
	Route::get('/', [
	'uses' 				=> 'BackendController@index',
	'as' 					=> 'backend.root',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	//Users
	Route::get('/users', [
	'uses' 				=> 'UsersController@viewUsers',
	'as' 					=> 'backend.users.view',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin','Frontend']
	]);
	Route::get('/users/edit', [
	'uses' 				=> 'UsersController@editUsers',
	'as' 					=> 'backend.users.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/users/update', [
	'uses' 				=> 'UsersController@updateUsers',
	'as' 					=> 'backend.users.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	//Notes
	Route::get('/notes', [
	'uses' 				=> 'NotesController@index',
	'as' 					=> 'backend.notes',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/notes/new', [
	'uses' 				=> 'NotesController@newNote',
	'as' 					=> 'backend.notes.new',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/notes', [
	'uses' 				=> 'NotesController@create',
	'as' 					=> 'backend.notes.create',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

});



Route::get('/', function () { return view('welcome'); });

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/formulario', 'HomeController@formulario')->name('formulario');

