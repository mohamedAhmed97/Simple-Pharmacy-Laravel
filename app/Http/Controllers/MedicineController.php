<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MedicineController extends Controller
{
    public function index(){
        return view('admins.medicines.index',[
            'medicines' => Medicine::all(),
             DataTables::of(Medicine::query())->make(true)
        ]);
    }

    public function create(){
        return view('admins.medicines.create', [
            'medicines' => Medicine::all(),
        ]);
    }

    public function store(){
        $request = request();
        $validatedData = $request->validate([
            'medicine_name' => 'required|min:3|unique:medicines',
            'medicine_quantity' => 'required',
            'medicine_type' => 'required|min:4',
            'medicine_price' => 'required',
        ],[
            'medicine_name.min' => 'Medicine name has minimum of 3 chars',
            'medicine_name.required' => 'Medicine name is required, you have to fill it!',
            'medicine_name.unique' => 'Medicine name is unique, you have to choose a different title!',
            'medicine_quantity.required' => 'Medicine quantity is required, you have to fill it!',
            'medicine_type.required' => 'Medicine type is required, you have to fill it!',
            'medicine_type.min' => 'The Type has minimum of 4 chars',
            'medicine_price.required'=>'Price is required, you have to fill it!',
        ]);

        Medicine::create([
            'medicine_name' => $request->medicine_name,
            'medicine_quantity' =>  $request->medicine_quantity,
            'medicine_type' =>  $request->medicine_type,
            'medicine_price' =>  $request->medicine_price,
        ]);
        
        return redirect()->route('medicines.index');
    }

}
