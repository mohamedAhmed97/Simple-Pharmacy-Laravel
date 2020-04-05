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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//=====admins.index=========
Route::get('/admins', 'AdminController@index')->name('admins.index');

//=====admins.medicines=========
Route::group(['prefix' => 'admins'], function () {
    Route::get('medicines', 'MedicineController@index')->name('medicines.index');
    Route::get('medicines/create', 'MedicineController@create')->name('medicines.create');
    Route::post('medicines', 'MedicineController@store')->name('medicines.store');
    });





Route::group(['prefix' => 'admins'], function () {

//=======admin's.pharmacy==========


Route::get('pharmacies', 'PharmacyController@index')->name('pharmacies.index');

Route::get('pharmacies/create', 'PharmacyController@create')->name('pharmacies.create');

Route::post('pharmacies', 'PharmacyController@store')->name('pharmacies.store');

Route::delete('/pharmacies/{pharmacy}', 'PharmacyController@destroy')->name('pharmacies.destroy');

Route::get('pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');

Route::get('pharmacies/{pharmacy}/edit', 'PharmacyController@edit')->name('pharmacies.edit');

Route::put('pharmacies/{pharmacy}', 'PharmacyController@update')->name('pharmacies.update');


//========= admin's areas =========

Route::get('areas', 'AreaController@index')->name('areas.index');
    
Route::get('areas/create', 'AreaController@create')->name('areas.create');
    
Route::post('areas', 'AreaController@store')->name('areas.store');
    
Route::delete('/areas/{areas}', 'AreaController@destroy')->name('areas.destroy');
    
Route::get('areas/{areas}/edit', 'AreaController@edit')->name('areas.edit');
    
Route::put('areas/{areas}', 'AreaController@update')->name('areas.update');
    
    


});



