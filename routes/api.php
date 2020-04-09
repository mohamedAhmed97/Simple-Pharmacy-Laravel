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
Route::post('/v1/register','API\users\UserController@store');

<<<<<<< HEAD
//login
Route::post('/v1/login', function (Request $request) {
=======
Route::group(['prefix' => 'users'], function(){
    Route::get('/', 'API\UserController@index');
    Route::get('/{user}', 'API\UserController@show');
});


Route::post('/sanctum/token', function (Request $request) {
>>>>>>> 3ef032455b9b223e2df8b82b5d69a227c176ddff
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