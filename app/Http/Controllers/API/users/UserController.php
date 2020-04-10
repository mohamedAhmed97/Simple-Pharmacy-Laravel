<?php

namespace App\Http\Controllers\API\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\UserWelcomeNotification;
use App\User;
use Hash;
use Notification;

class UserController extends Controller
{
   //store
   public function store(request $request)
   {
        //name of picture
        $user_avatar_name= time().$request->file('avatar')->getClientOriginalName();
        //upload file
        $path = $request->file('avatar')->storeAs(
            'public/user',$user_avatar_name);

       $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'password'=>Hash::make($request->password), 
            'date_of_birth'=>$request->date_of_birth,
            'avatar'=>$request->user_avatar_name,
            'mobile_number'=>$request->mobile_number,
            'national_id'=>$request->national_id,
            'area_id'=>$request->area_id,
            'street_name'=>$request->street_name,
            'building_number'=>$request->building_number,
            'floor_number'=>$request->floor_number,
            'flat_number'=>$request->flat_number,
            'is_main'=>$request->is_main,    
        ]);
        
        if($user)
        {
            $details = [
                'greeting' => 'Hi '.$user->name,
                'body' => 'This is my first notification from ITI',
                'thanks' => 'Thank you for using Simple Simple Simple Simpe Pharmacy!',
                'actionText' => 'View My Site',
                'actionURL' => url('/'),
                'order_id' => 101
            ];
            Notification::send($user, new UserWelcomeNotification($details));
            return response()->json([
                'message' => 'User Added',
                'status' => '200'
            ]);
        }
   }
}
