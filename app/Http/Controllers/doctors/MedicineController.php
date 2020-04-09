<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use App\Medicine;
use App\Pharmacy;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\MedicineRequest;
use Auth;
class MedicineController extends Controller
{
    public function index(){
        return view('doctors.medicines.index',[
            'medicines' => Medicine::all(),
             DataTables::of(Medicine::query())->make(true)
        ]);
    }

    public function create(){
        return view('doctors.medicines.create',[
            'medicines' => Medicine::all(),
             DataTables::of(Medicine::query())->make(true)
        ]);
    }

    public function store(Request $request){
        //pharmacy id ->currnt user
        $phar_id=Auth::guard('doctor')->user()->pharmacy_id;
        // //get pharmacy
        $pharmacy=Pharmacy::find($phar_id);
        $medicines=$request->check;
        if($medicines!=null){
            foreach($medicines as $key=>$medicine)
            {
                $data="quantity".$request->check[$key]; 
                //get medicine
                $medicinedata=Medicine::find($medicine);  
                $quantity=$request->$data;
                $pharmacy->medicines()->attach($medicinedata ,['quantity'=>$quantity]);
            }
            alert()->success('medicine  Added.', 'Operation Done!');
            return redirect()->route('medicines.index');
        }
        else
        {
            alert()->error('You didnt Select Any Medicine.', 'Operation Fail!');
            return redirect()->route('medicines.index');
        }
      
    }

    public function show(){ 
        return view('doctors.medicines.show',[
            'medicine' => Medicine::find(request()->medicine),
        ]);
    }

    public function destroy(){
        Medicine::find(request()->medicine)->delete();
        return redirect()->route('medicines.index');
    }

    public function edit(){
        return view('doctors.medicines.edit',[
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