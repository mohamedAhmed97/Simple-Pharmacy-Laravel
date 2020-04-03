<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use App\Doctor;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    
    public function index(){
        $pahrmacies = Pharmacy::all();

        return view('admins.pharmacy.index', [
            'pharmacies' => $pahrmacies,
        ]);
        
    }

    public function show(){

    }


    public function create(){
        //get all areas
        $areas=Area::all();
        return view('admins.pharmacy.create')->with('areas',$areas);
    }

    //store pharmacy & doctor
    public function store(Request $request){
        //name of picture
        $pharmacy_avatar_name=time().$request->file('ph_avatar')->getClientOriginalName();
        //upload file
        $path = $request->file('ph_avatar')->storeAs(
            'avatars/pharmacies',$pharmacy_avatar_name);
        //store pharmacy
        $paharamcy=Pharmacy::create([
            'ph_name' => $request->ph_name ,
            'ph_area' => $request->ph_area,
            'ph_avatar'=>$pharmacy_avatar_name,
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
