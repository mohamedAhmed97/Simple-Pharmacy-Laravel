<?php

namespace App\Http\Controllers;

use App\Area;
use App\Doctor;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        
        return view('orders.index' ,[
        'orders' => $orders,
        ]);
    }
    public function create()
    {
        return view('orders.create');
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
      
        
        return view('doctors.orders.edit',[
           
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
