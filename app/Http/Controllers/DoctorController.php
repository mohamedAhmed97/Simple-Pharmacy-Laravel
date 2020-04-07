<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor; 

class DoctorController extends Controller
{

    public function index()
    {
        $doctors= Doctor::all();
        return view('admins.doctors.index', ["doctors"=>$doctors]);
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
        return view('admins.doctors.create');
    }

    public function store()
    {
        $request=request(); 
        Doctor::create([
            'id'=> $request->id,
            'name' => $request->name, 
            'password' => $request->password,
            'email'=>$request->email,
            'dr_national_id'=>$request->ids,
            'pharmacy_id'=>$request->pharmacyid 

        ]);
        return redirect('admins/doctors');
    }

    public function destroy()
    {
        $request = request();
        $doctorId = $request->doctor;
        Doctor::where('id', $doctorId)->delete();
        return redirect()->route('doctors.index');
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
}

