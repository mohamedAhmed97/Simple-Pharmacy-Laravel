<?php

namespace App\Http\Controllers\doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DoctorAdminController extends Controller
{
    public function index()
    {   
        return view('doctors.index');
     }
}
