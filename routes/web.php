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

//=======Admins Section ==========
// all Admins routes under Admins cortrol starts with 'admins'

Route::group(['prefix' => 'admins', 'middleware' => 'auth'], function(){

    //==================admins.index===============================
    Route::GET('/', 'AdminController@index')->name('admins.index');

    //==================admins.medicines============================
    Route::GET('/medicines', 'MedicineController@index')->name('medicines.index');
    Route::GET('/medicines/create', 'MedicineController@create')->name('medicines.create');
    Route::post('/medicines', 'MedicineController@store')->name('medicines.store');
    Route::GET('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
    Route::DELETE('/medicines/{medicine}', 'MedicineController@destroy')->name('medicines.destroy');
    Route::GET('/medicines/{medicine}/edit', 'MedicineController@edit')->name('medicines.edit');
    Route::PUT('/medicines/{medicine}', 'MedicineController@update')->name('medicines.update');

    //=================admin's.pharmacy==============================
    Route::get('pharmacies', 'PharmacyController@index')->name('pharmacies.index');
    Route::get('pharmacies/create', 'PharmacyController@create')->name('pharmacies.create');
    Route::post('pharmacies', 'PharmacyController@store')->name('pharmacies.store');
    Route::delete('/pharmacies/{pharmacy}', 'PharmacyController@destroy')->name('pharmacies.destroy');
    Route::get('pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');
    Route::get('pharmacies/{pharmacy}/edit', 'PharmacyController@edit')->name('pharmacies.edit');
    Route::put('pharmacies/{pharmacy}', 'PharmacyController@update')->name('pharmacies.update');

    //=================admin's areas =================================
    Route::get('areas', 'AreaController@index')->name('areas.index');   
    Route::get('areas/create', 'AreaController@create')->name('areas.create');    
    Route::post('areas', 'AreaController@store')->name('areas.store');    
    Route::delete('/areas/{areas}', 'AreaController@destroy')->name('areas.destroy');      
    Route::get('areas/{areas}/edit', 'AreaController@edit')->name('areas.edit');    
    Route::put('areas/{areas}', 'AreaController@update')->name('areas.update');

    //=================admin's users =================================
    Route::get('users', 'UserController@index')->name('users.index'); 

    //==================admin's. doctor. order==========================
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/create', 'OrderController@create')->name('orders.create');
    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::delete('/orders/{orders}', 'OrderController@destroy')->name('orders.destroy');
    Route::get('/orders/{orders}/edit', 'OrderController@edit')->name('orders.edit');


    //==================admin's. doctor==============================
    Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
    Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
    Route::get('/doctors/{doctor}','DoctorController@show')->name('doctors.show');
    Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
    Route::delete('/doctors/{doctor}', 'DoctorController@destroy')->name('doctors.destroy');
    Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
    Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');

    //==================admin's. doctor. order==========================
    Route::get('/doctors/orders', 'OrderController@index')->name('doctors.index');

});


//=======Doctors Section ==========
// all Doctors routes under doctors cortrol starts with 'doctors'
Route::group(['prefix' => 'pharmacy'], function () {
    //show doctors login page
    Route::get('/login', 'doctors\DoctorLoginController@index')->name('doctorLogin.index');
    //doctor login  
    Route::post('/login', 'doctors\DoctorLoginController@login');
});

Route::group(['prefix' => 'pharmacy','middleware'=>'DoctorLogin'], function () {
    //doctor Admin panel
    Route::get('/','doctors\DoctorAdminController@index')->name('pharmacy.index');
    //show doctors in pharmacy
    Route::get('/doctors','doctors\DoctorController@index')->name('doctor.index');
    //create doctor
    Route::get('/doctors/create','doctors\DoctorController@create')->name('doctor.create');
    Route::post('/doctors/create','doctors\DoctorController@store');
    //delete
    Route::delete('/doctors/destroy/{id}', 'doctors\DoctorController@destroy')->name('doctor.destroy');
    //update doctor
    Route::get('/doctors/{doctor}/edit', 'doctors\DoctorController@edit')->name('doctor.edit');
    Route::put('/doctors/{doctor}', 'doctors\DoctorController@update')->name('doctor.update');
    //doctor Activation
    Route::put('/doctors/{doctor}/activations', 'doctors\DoctorController@activation')->name('doctor.active');

    //========= pharmacy medicine ==========

    Route::GET('/medicines', 'doctors\MedicineController@index')->name('medicines.index');
    Route::GET('/medicines/create', 'doctors\MedicineController@create')->name('medicines.create');
    Route::post('/medicines', 'doctors\MedicineController@store')->name('medicines.store');
    Route::GET('/medicines/{medicine}', 'doctors\MedicineController@show')->name('medicines.show');
    Route::DELETE('/medicines/{medicine}', 'doctors\MedicineController@destroy')->name('medicines.destroy');
    Route::GET('/medicines/{medicine}/edit', 'doctors\MedicineController@edit')->name('medicines.edit');
    Route::PUT('/medicines/{medicine}', 'doctors\MedicineController@update')->name('medicines.update');

});


