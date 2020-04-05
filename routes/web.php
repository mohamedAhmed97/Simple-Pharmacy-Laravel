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

Route::GET('/home', 'HomeController@index')->name('home');
//=====admins.index=========
Route::GET('/admins', 'AdminController@index')->name('admins.index');



Route::group(['prefix' => 'admins'], function () {
//=====admins.medicines=========
    Route::GET('/medicines', 'MedicineController@index')->name('medicines.index');
    Route::GET('/medicines/create', 'MedicineController@create')->name('medicines.create');
    Route::post('/medicines', 'MedicineController@store')->name('medicines.store');
    Route::GET('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
    Route::DELETE('/medicines/{medicine}', 'MedicineController@destroy')->name('medicines.destroy');
    Route::GET('/medicines/{medicine}/edit', 'MedicineController@edit')->name('medicines.edit');
    Route::PUT('/medicines/{medicine}', 'MedicineController@update')->name('medicines.update');

//=======admin's.pharmacy==========
// all pharmacy routes under admins cortrol starts with 'admins'
    Route::get('pharmacy', 'PharmacyController@index')->name('pharmacy.index');

    Route::get('pharmacy/create', 'PharmacyController@create')->name('pharmacy.create');

    Route::post('pharmacy', 'PharmacyController@store')->name('pharmacy.store');

    Route::delete('/pharmacy/{pharmacy}', 'PharmacyController@destroy')->name('pharmacy.destroy');

    Route::get('pharmacy/{pharmacy}', 'PharmacyController@show')->name('pharmacy.show');

    Route::get('pharmacy/{pharmacy}/edit', 'PharmacyController@edit')->name('pharmacy.edit');

    Route::put('pharmacy/{pharmacy}', 'PharmacyController@update')->name('pharmacy.update');
});
