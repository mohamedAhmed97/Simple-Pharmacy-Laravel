<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
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
            "pharmacy_id"=>$request->pharmacy_id,
            "totalprice"=>$value

        ]);
       
        return redirect()->route('orders.index');
    }
}

/*$table->id();
$table->string('order_name');
$table->string('Deliver_Address');
$table->timestamps();
$table->foreignId('dr_id')->references('id')->on('pharmacies')->onDelete('cascade');
$table->string('isinsured');
$table->integer('status');
$table->integer('quantity'); 
$table->float('price');
$table->float('totalprice');*/