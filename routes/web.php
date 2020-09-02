<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function ()
{
    return Redirect::route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Create file upload form
Route::get('/upload-file', 'FileUpload@createForm');

// Store file
Route::post('/upload-file', 'FileUpload@fileUpload')->name('fileUpload');

Route::post('/parse', 'ParseController@parse')->name('parse');

Route::post('/preview', 'ParseController@preview')->name('preview');
