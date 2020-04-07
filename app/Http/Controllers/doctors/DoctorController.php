<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Auth;
use Hash;
use App\Http\Requests\StoreDoctor;
class DoctorController extends Controller
{   
    

    public function index()
    {
         //current user
        $user=Auth::guard('doctor')->user();
        //get doctors
        $doctors=Doctor::where('id','!=',$user->id)
        ->where('pharmacy_id',$user->pharmacy_id)->get();
        
        return view('doctors.doctors.index')->with('doctors',$doctors);
    }
    public function show()
    {
        $request= request(); 
        $doctorId= $request->doctor;

        $doctor= Doctor::find($doctorId);
      
        return view('admins.doctors.show', ["doctor" => $doctor]);
    }
    public function create()
    {   
        return view('doctors.doctors.create');
    }

    public function store(StoreDoctor $request)
    {   
        $pic=$request->file('avatar');
        //name of picture
        $Doctor_avatar_name=time().$pic->getClientOriginalName();
        
        //upload file
        $path = $pic->storeAs(
            'public/doctors',$Doctor_avatar_name); 
        Doctor::create([
            'name' => $request->name, 
            'password' => Hash::make($request->password),
            'email'=>$request->email,
            'dr_avatar'=>$Doctor_avatar_name,
            'dr_national_id'=>$request->nationalID,
            'pharmacy_id'=>DoctorController::CurrentUser()->pharmacy_id,

        ]);
        return redirect()->route('doctor.index')
        ->with('success-message', 'Doctor Added');
    }

    public function destroy($id)
    {
        Doctor::find($id)->delete();
        /* return redirect()->route('doctors.index'); */
        return response()->json([
            'message' => 'Data deleted successfully!'
          ]);
    }


    public function edit()
    {
        $request = request();
        $doctorId = $request->doctor;
        $doctor = Doctor::find($doctorId);  
        return view('admins.doctors.edit',[
            'doctor' => $doctor
        ]);
    }
    public function update($doctorId)
    {
        $request=request();
        

        Doctor::where('id', $doctorId)->first()->update(request()->all());


        return redirect()->route('doctors.index');
    }


    public function CurrentUser()
    {
        $user=Auth::guard('doctor')->user();
       return $user=Auth::guard('doctor')->user();
    }
}
