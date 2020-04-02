<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use App\Doctor;
use App\Area;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    
    public function index(){
        return view('admins.pharmacy.index');
    }


    public function create(){
        //get all areas
        $areas=Area::all();
        return view('admins.pharmacy.create')->with('areas',$areas);
    }

    //store pharmacy & doctor
    public function store(Request $request){
        /* dd($request); */
        //store pharmacy
        $paharamcy=Pharmacy::create([
            'ph_name' => $request->ph_name ,
            'ph_area' => $request->ph_area,
        ]);
        //store pharmacy owner
        Doctor::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => $request->pwd,
            'dr_national_id' => $request->nationalID,
            'is_owner' => 1,
            'pharmacy_id'=>$paharamcy->id,
        ]);
        return redirect()->route('pharmacy.index');
    }


}
