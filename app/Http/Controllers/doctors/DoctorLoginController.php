<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Doctor;
class DoctorLoginController extends Controller
{
    //show page
    public function index()
    {
        return view('doctors.login');
    }
    //login 
    public function login(request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('doctor')-> attempt($credentials)) {
            return redirect()->route('pharmacy.index');
        }
        else
        {
            dd("Error");
        }

    }

}
