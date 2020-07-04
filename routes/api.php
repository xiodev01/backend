<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'auth','namespace'=> 'auth'], function () {
   
Route::post('signin', 'SigninController');
Route::post('signout', 'SignoutController');
Route::get('signme', 'SignmeController');
    
});
Route::post('Settings', 'SettingsController@store');
Route::put('Settings/{id}', 'SettingsController@update');
Route::get('Settings', 'SettingsController@index');

Route::post('Adjestments', 'AdjestmentController@store');
Route::get('Adjestments', 'AdjestmentController@index');
Route::put('Adjestments/{id}', 'AdjestmentController@update');

Route::post('CSR', 'CSRController@store');
Route::get('CSR', 'CSRController@index');
Route::put('CSR/{id}', 'CSRController@update');

Route::get('Contacts', 'ContactController@index');
Route::post('Contacts', 'ContactController@store');

Route::get('About', 'AboutPageController@index');
Route::post('About', 'AboutPageController@store');
Route::put('About/{id}', 'AboutPageController@update');

Route::get('Welcome', 'WelcomePageController@index');
Route::post('Welcome', 'WelcomePageController@store');
Route::put('Welcome/{id}', 'WelcomePageController@update');

Route::get('ImportNote', 'ImportexportnoteController@importNote_index');
Route::get('ExportNote', 'ImportexportnoteController@exportNote_index');

Route::post('ImportNote', 'ImportexportnoteController@ImportNote_store');
Route::post('ExportNote', 'ImportexportnoteController@ExportNote_store');

Route::put('ImportNote/{id}', 'ImportexportnoteController@ImportNote_update');
Route::put('ExportNote/{id}', 'ImportexportnoteController@ExportNote_update');

Route::get('Product', 'ProductController@index');
Route::post('Product', 'ProductController@store');
Route::delete('ProductImage/{id}', 'ProductController@Image_destroy');
Route::put('Product/{id}', 'ProductController@update');
Route::delete('Product/{id}', 'ProductController@destroy');


