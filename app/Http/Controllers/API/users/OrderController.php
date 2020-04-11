<?php

namespace App\Http\Controllers\API\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\picture_order;
class OrderController extends Controller
{
    //create order
    public function store(request $request)
    {    
        //==> user Address 
        $address=($request->user()->street_name." ".
            $request->user()->street_name." ".
            $request->user()->building_number." ".
            $request->user()->floor_number." ".
            $request->user()->flat_number);
        //==> create order
        $order=Order::create([
            'order_name'=>$request->user()->name,
            'Deliver_Address'=>$address,
            'isinsured'=>"s",
            'area_id'=>$request->user()->area_id,
        ]);
        //==> upload pic
        $avatars=$request->file('avatar');
        if($avatars)
        {
            //==> name of picture
            $order_avatar_name= time().$avatars->getClientOriginalName();
            //==> upload file
            $path =$avatars->storeAs(
                'public/order',$order_avatar_name);
            //==> create picture_order
            picture_order::create([
                'avatar'=>$order_avatar_name,
                'order_id'=>$order->id
            ]);    
           /*  foreach($avatars as $avatar)
            {
                //==> name of picture
                $order_avatar_name= time().$avatar->getClientOriginalName();
                //==> upload file
                $path =$avatar->storeAs(
                    'public/order',$order_avatar_name);
                //==> create picture_order
                picture_order::create([
                    'avatar'=>$order_avatar_name,
                    'order_id'=>$order->id
                ]);    
            } */
        }
        return response()->json([
            'message' => 'order Added',
            'status' => '200'
        ]);
    }
    
}
