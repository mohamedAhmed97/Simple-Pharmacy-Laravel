<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(){
        return UserResource::collection(User::all()); 
    }

    public function show(){
        //check if the user doesn't exist in the database
        if(is_null(request()->id)){
            return response()->json(["Error"=>"Record doesn't found in the datatabase!! Enter a valid id ^_^"],404);
        }
        return new UserResource(User::find(request()->user));
    }
}
