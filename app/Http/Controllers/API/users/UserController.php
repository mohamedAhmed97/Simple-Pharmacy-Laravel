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
       $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'flat'=>$request->flat,
            'Building'=>$request->Building,
            'road'=>$request->road,
            'area_id'=>$request->area_id,
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
