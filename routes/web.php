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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'Controller@index')->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/newFilm', 'FilmsController@addFilms')->name('newFilm');

Route::post('/newFilm','FilmsController@store');

Route::get('/editProfile', 'UserController@editGet')->name('editProfile');

Route::post('/editProfile','UserController@editUserPost');

Route::get('/allUsers','UserController@allUsers');

Route::get('/allUsers/{user}','UserController@currentUser');

Route::post('/allUsers','UserController@addPost');

Route::post('/allUsers1','UserController@addRate');

Route::get('/allFilms/{film}','FilmsController@currentFilm');

//Route::get('/test', 'TestController@test');