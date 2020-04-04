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
class PharmacyController extends Controller
{
    
    public function index(){
        $pahrmacies = Pharmacy::all();

        return view('admins.pharmacy.index', [
            'pharmacies' => $pahrmacies,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        $pharmacy = Pharmacy::find($pharmacyId);
        $owner = Doctor::find($pharmacyId);
        return view('admins.pharmacy.show',[
            'pharmacy' => $pharmacy,
            'owner' =>$owner
        ]);
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
            'password' => $request->pwd,
            'dr_national_id' => $request->nationalID,
            'is_owner' => 1,
            'pharmacy_id'=>$paharamcy->id,
        ]);
        //set role
        $doctor->assignRole('pharmacy owner');
        return redirect()->route('pharmacy.index');
    }


    public function destroy()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        Pharmacy::where('id', $pharmacyId)->delete();
        Doctor::where('pharmacy_id',$pharmacyId)->delete();
        
        return redirect()->route('posts.index');
    }



    public function edit()
    {
        $request = request();
        $pharmacyId = $request->pharmacy;
        $pharmacy = Pharmacy::find($pharmacyId);
        $owner = Doctor::find($pharmacyId);
        $areas=Area::all();
        
        return view('admins.pharmacy.edit',[
            'pharmacy' => $pharmacy,
            'owner' => $owner,
            'areas' => $areas
        ]);
    }


    public function update($pharmacyId)
    {
        Pharmacy::where('id', $pharmacyId)->first()->update(request()->all());
        
        return redirect()->route('pharmacy.index');
    }

}
