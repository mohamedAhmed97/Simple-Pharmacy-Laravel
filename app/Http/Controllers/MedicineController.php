<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\MedicineRequest;

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

    public function store(MedicineRequest $request){
        Medicine::create([
            'medicine_name' => $request->medicine_name,
            'medicine_quantity' =>  $request->medicine_quantity,
            'medicine_type' =>  $request->medicine_type,
            'medicine_price' =>  $request->medicine_price,
        ]);
        return redirect()->route('medicines.index');
    }

    public function show(){ 
        return view('admins.medicines.show',[
            'medicine' => Medicine::find(request()->medicine),
        ]);
    }

    public function destroy(){
        Medicine::find(request()->medicine)->delete();
        return redirect()->route('medicines.index');
    }

    public function edit(){
        return view('admins.medicines.edit',[
            'medicine' => Medicine::find(request()->medicine),
            'medicines'=>Medicine::all(),
        ]);
    }

    public function update(MedicineRequest $request,$medicineId){
        $medicineId = $request->medicine;
        Medicine::where('id', $medicineId)
            ->update([
                'medicine_name' => $request->medicine_name,
                'medicine_quantity' => $request->medicine_quantity,
                'medicine_type' =>  $request->medicine_type,
                'medicine_price' =>  $request->medicine_price,
            ]);
        return redirect()->route('medicines.index');
    }
}
