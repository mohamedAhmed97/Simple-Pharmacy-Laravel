<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Auth;
use Hash;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Requests\StoreDoctor;
use App\Http\Requests\UpdateDoctor;
use Yajra\DataTables\Facades\DataTables;
class DoctorController extends Controller
{   
    

    public function index()
    {
         //current user
        $user=Auth::guard('doctor')->user();
        //get doctors
        $doctors=Doctor::where('id','!=',$user->id)
        ->where('pharmacy_id',$user->pharmacy_id)->get();
        
        return view('doctors.doctors.index',[
            'doctors' => $doctors,
             DataTables::of(Doctor::query())->make(true)
        ]);
        
       
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
        alert()->success('Doctor Added.', 'Operation Done!');
        return redirect()->route('doctor.index');
    }

    public function destroy($id)
    {
        
       $doctor=Doctor::find($id);
        //delete image
        $postion=storage_path().'/app/public/doctors/'.$doctor->dr_avatar;
        //Storage::delete($postion);
        unlink($postion); 
        //delete
       $doctor->delete();    
    }


    public function edit($doctor)
    {
        $doctordata = Doctor::find($doctor); 
        return view('doctors.doctors.edit',[
            'doctor' => $doctordata
        ]);
    }
    public function update(UpdateDoctor $request,$doctor)
    {
        
       //get doctor
       $doctordata=Doctor::find($doctor);
       //delete image
       $postion=storage_path().'/app/public/doctors/'.$doctordata->dr_avatar;
       //delete
       unlink($postion);
        
       //pic
       $pic=$request->file('avatar');
       //name of picture
       $Doctor_avatar_name=time().$pic->getClientOriginalName();
       
       //upload file
       $path = $pic->storeAs(
           'public/doctors',$Doctor_avatar_name); 

       //update
       $doctordata->update([
            'name' => $request->name, 
            'password' => Hash::make($request->password),
            'email'=>$request->email,
            'dr_avatar'=>$Doctor_avatar_name,
            'dr_national_id'=>$request->nationalID,
            'pharmacy_id'=>DoctorController::CurrentUser()->pharmacy_id,
           ]);
           
        alert()->info('Updated', 'Doctor Updated'); 
        return redirect()->route('doctor.index');
    }

    //activation Doctor
    public function activation($doctor)
    {
        $doctordata=Doctor::find($doctor);  
       
        if($doctordata->is_active==1)
        {
            $doctordata->update([
                'is_active'=> '0',
                ]);
               
        }
        else
        {
            $doctordata->update([
               
                'is_active'=> '1'
                ]);
        }
       
    }

    public function CurrentUser()
    {
        $user=Auth::guard('doctor')->user();
       return $user=Auth::guard('doctor')->user();
    }
}
