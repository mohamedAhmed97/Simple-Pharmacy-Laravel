<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
//registe
Route::post('/register','API\users\UserController@store');

Route::group(['prefix' => 'users'], function(){
    Route::get('/', 'API\UserCRUDController@index');
    Route::get('/{user}', 'API\UserCRUDController@show');
    Route::post('/', 'API\UserCRUDController@store');
    Route::delete('/{user}', 'API\UserCRUDController@destroy');
    Route::put('/{user}', 'API\UserCRUDController@update');
});

//login
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
//users order
Route::group(['prefix' => 'users','middleware'=>'auth:sanctum'], function () {
    Route::post('/orders/create','API\users\OrderController@store');  
});