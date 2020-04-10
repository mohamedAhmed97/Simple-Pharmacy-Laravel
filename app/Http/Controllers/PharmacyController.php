<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use App\Doctor;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use DB;
use App\Http\Requests\StorePharmacy;
use Hash;
use Yajra\DataTables\Facades\DataTables;




class PharmacyController extends Controller
{
    
    public function index(){
        $pahrmacies = Pharmacy::all();

        return view('admins.pharmacies.index', [
            'pharmacies' => $pahrmacies,
            DataTables::of(Pharmacy::query())->make(true)
        ]);
        
    }

    public function show()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        $pharmacy = Pharmacy::find($pharmacyId);
        $owner = Doctor::where('pharmacy_id')->where('is_owner' , 1)->first();
        return view('admins.pharmacies.show',[
            'pharmacy' => $pharmacy,
            'owner' =>$owner
        ]);
    }


    public function create(){
        //get all areas
        $areas=Area::all();
        return view('admins.pharmacies.create')->with('areas',$areas);
    }

    //store pharmacy & doctor
    public function store(StorePharmacy $request){
        //name of picture
        $pharmacy_avatar_name=time().$request->file('ph_avatar')->getClientOriginalName();
        //upload file
        $path = $request->file('ph_avatar')->storeAs(
            'public/pharmacies',$pharmacy_avatar_name);

        //store pharmacy
        $paharamcy=Pharmacy::create([
            'ph_name' => $request->ph_name ,
            'area_id' => $request->ph_area,
            'ph_avatar'=>$pharmacy_avatar_name,
        ]);

        //store pharmacy owner
        $doctor=Doctor::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->pwd),
            'dr_national_id' => $request->nationalID,
            'is_owner' => 1,
            'pharmacy_id'=>$paharamcy->id,
        ]);
        //set role
        $doctor->assignRole('pharmacy owner');
        return redirect()->route('pharmacies.index');
    }


    public function destroy()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        Pharmacy::where('id', $pharmacyId)->delete();
        Doctor::where('pharmacy_id',$pharmacyId)->delete();
        
        return redirect()->route('pharmacies.index');
    }



    public function edit()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        $pharmacy = Pharmacy::find($pharmacyId);
        $owner = Doctor::where('pharmacy_id' , $pharmacyId)->where('is_owner' , 1)->first();
        $areas=Area::all();
        
        
        return view('admins.pharmacies.edit',[
            'pharmacy' => $pharmacy,
            'owner' => $owner,
            'areas' => $areas
        ]);
    }


    public function update($pharmacyId)
    {
        Pharmacy::where('id', $pharmacyId)->first()->update(request()->all());
        
        return redirect()->route('pharmacies.index');
    }

}
