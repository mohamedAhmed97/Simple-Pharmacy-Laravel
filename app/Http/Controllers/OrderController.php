<?php

namespace App\Http\Controllers;

use App\Area;
use App\Doctor;
use App\Order;
use Illuminate\Http\Request;

use App\User;
use App\Medicine;


class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view('orders.index',[
        'orders'=>$orders
        ]);
        //return view('orders.index');
    }
    public function create()
    {
        $users = User::all();
        $medicines = Medicine::all();
        return view('orders.create',['users'=>$users,'medicines'=>$medicines ]);
        //return view('orders.create');
    }
    public function store(){
        $request=request();
        $value= ($request->medicinequantity*$request->medicineprice)/100;
            
        Order::create([
            "order_name"=> $request->ordername,
            "Deliver_Address"=>$request->address,
            "dr_id"=> $request->doctorid,
            "isinsured"=>$request->isinsured,
            "status"=>$request->status,
            "quantity"=>$request->quantity,
            "pharmacy_id"=>$request->pharmacy_id,
            "price"=>$request->price,
            "totalprice"=>$value

        ]);
       
        return redirect()->route('orders.index');
    }

    public function destroy()
    {
        $request = request();
        $orderID = $request->orders;
        Order::where('id', $orderID)->delete();
        
        return redirect()->route('orders.index');
    }


    public function edit()
    {
        $request = request();
        $orderID = $request->orders;
        $order = Order::find($orderID);
        $doctorId = Doctor::find($orderID);
        $areaId = Area::find($orderID);
      
        
        return view('orders.edit',[
           
            'order' => $order,
            'doctor' => $doctorId,
            'area' => $areaId
        ]);
    }

    public function update($orderID)
    {
        
        Order::where('id', $orderID)->first()->update(request()->all());
        
        return redirect()->route('orders.index');
    }
}
