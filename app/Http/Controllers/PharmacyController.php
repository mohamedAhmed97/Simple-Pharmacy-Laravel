<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use App\Doctor;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    
    public function index(){
        return view('admins.pharmacy.index');
    }


    public function create(){
        return view('admins.pharmacy.create');
    }

    public function store(Request $request){
        Pharmacy::create([
            'ph_name' => $request->ph_name ,
            'ph_area' => $request->ph_area,
            
        ]);

        Doctor::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => $request->password,
            'dr_national_id' => $request->nationalID,
            'is_owner' => 1,
        ]);
        return redirect()->route('admins.pharmacy.index');
    }


}
