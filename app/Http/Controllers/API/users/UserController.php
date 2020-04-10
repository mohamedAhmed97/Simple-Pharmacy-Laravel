<?php

namespace App\Http\Controllers\API\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
class UserController extends Controller
{
   //store
   public function store(request $request)
   {

        //name of picture
        $user_avatar_name=time().$request->file('avatar')->getClientOriginalName();
        //upload file
        $path = $request->file('avatar')->storeAs(
            'public/user',$user_avatar_name);

       $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'phone'=>$request->phone,
        'floor_number'=>$request->floor_number,
        'flat_number'=>$request->flat_number,
        'building_number'=>$request->building_number,
        'street_id'=>$request->street_id,
        'is_main'=>$request->is_main,
        'area_id'=>$request->area_id,
        'avatar'=>$request->user_avatar_name,
        ]);
        if($user)
        {
            return response()->json([
                'message' => 'User Added',
                'status' => '200'
            ]);
        }
   }
}
