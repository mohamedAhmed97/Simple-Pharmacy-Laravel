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
        $user= User::find(request()->user);
        //check if the user doesn't exist in the database
        if(is_null($user)){
            return response()->json(["Error"=>"Record doesn't found in the datatabase!! Enter a valid id ^_^"],404);
        }
        return new UserResource($user);
    }
    public function store(){
        $request = request();
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'password'=>$request->password, 
            'date_of_birth'=>$request->date_of_birth,
            'avatar'=>$request->user_avatar_name,
            'mobile_number'=>$request->mobile_number,
            'national_id​'=>$request->national_id​,
            'area_id'=>$request->area_id,
            'street_name'=>$request->street_name,
            'building_number'=>$request->building_number,
            'floor_number'=>$request->floor_number,
            'flat_number'=>$request->flat_number,
            'is_main'=>$request->is_main,    
        ]);
        if($user)
        {
            return response()->json([
                'Success' => 'User is added successfully ^_^ ',
            ],200);
        }
        if(!$user){
            return response()->json(["Error"=>"Sorry,You can't create a new user as you have to fill all the required fields"],404);
        }
    }

    public function destroy(){
        User::find(request()->user)->delete();
        return response()->json(["Success"=>"You deleted this user successfully, This record isn't a part of the database anymore"],200);
    }
}
