<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserCRUDController extends Controller
{
    //get all the users in the database (users table)
    public function index(){
        return UserResource::collection(User::all()); 
    }

    //get one user in the database (users table)
    public function show(){
        $user= User::find(request()->user);
        //check if the user doesn't exist in the database
        if(is_null($user)){
            return response()->json(["Error"=>"Record doesn't found in the datatabase!! Enter a valid id ^_^"],404);
        }
        return new UserResource($user);
    }

    //add a new user to the database (users table)
    public function store(Request $request){
        $user=User::create($request->all());
        if($user)
        {
            return response()->json([
                "Success" => 'User is added successfully ^_^ ',
                "Data:"=> new UserResource($user),],200);
        }
        if(!$user){
            return response()->json(["Error"=>"Sorry,You can't create a new user as you have to fill all the required fields"],404);
        }
    }

    //delete a user from the database (users table)
    public function destroy(){
        $user=User::find(request()->user);
        if(is_null($user)){
            return response()->json(["Error"=>"Record doesn't found in the datatabase!! Enter a valid id ^_^"],404);
        }
        $user->delete();
        return response()->json(["Success"=>"You deleted this user successfully, This record isn't a part of the database anymore"],200);
    }
    
    //update a user in the database (users table)
    public function update(Request $request, $userId){ 
        $user= User::find($userId);
        if(is_null($user)){
            return response()->json(["Error"=>"Record doesn't found in the datatabase!! Enter a valid id ^_^"],404);
        }
        $user->update($request->all()); 
        return response()->json(["Success"=>"User Updated successfully",
                                    "New data:"=> new UserResource($user)],200);
    }
        
}
