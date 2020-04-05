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



//=======admin's.pharmacy==========
// all pharmacy routes under admins cortrol starts with 'admins'

Route::group(['prefix' => 'admins'], function () {

Route::get('pharmacy', 'PharmacyController@index')->name('pharmacy.index');

Route::get('pharmacy/create', 'PharmacyController@create')->name('pharmacy.create');

Route::post('pharmacy', 'PharmacyController@store')->name('pharmacy.store');

Route::delete('/pharmacy/{pharmacy}', 'PharmacyController@destroy')->name('pharmacy.destroy');

Route::get('pharmacy/{pharmacy}', 'PharmacyController@show')->name('pharmacy.show');

Route::get('pharmacy/{pharmacy}/edit', 'PharmacyController@edit')->name('pharmacy.edit');

Route::put('pharmacy/{pharmacy}', 'PharmacyController@update')->name('pharmacy.update');
});



//========= admin's areas =========

Route::group(['prefix' => 'admins'], function () {

    Route::get('areas', 'AreaController@index')->name('areas.index');
    
    Route::get('areas/create', 'AreaController@create')->name('areas.create');
    
    Route::post('areas', 'AreaController@store')->name('areas.store');
    
    Route::delete('/areas/{areas}', 'AreaController@destroy')->name('areas.destroy');
    
    Route::get('areas/{areas}/edit', 'AreaController@edit')->name('areas.edit');
    
    Route::put('areas/{areas}', 'AreaController@update')->name('areas.update');
    });
    