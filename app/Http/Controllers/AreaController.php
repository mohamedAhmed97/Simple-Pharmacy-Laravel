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
class AreaController extends Controller
{
    
    public function index(){
        $areas = Area::all();

        return view('admins.areas.index', [
            'areas' => $areas,
        ]);
        
    }



    public function create(){
        
        
        return view('admins.areas.create');
    }

    
    public function store(Request $request){
    
        $validatedData = $request->validate([
            'en_name' => 'required|min:3|unique:areas',
            'address' => 'required|min:3',
            
        ],[
            'en_name.min' => 'Area name has minimum of 3 chars',
            'en_name.required' => 'Area name is required, you have to fill it!',
            'en_name.unique' => 'Area name is unique, you have to choose a different name!',
            'address.min' => 'Address name has minimum of 3 chars',
            'address.required' => 'Address name is required, you have to fill it!',
            
            
        ]);

        
        Area::create([
            'en_name' => $request->en_name ,
            'address' => $request->address,
            
        ]);
        return redirect()->route('areas.index');

    }


    public function destroy()
    {
        $request = request();
        $areaId = $request->areas;
        Area::where('id', $areaId)->delete();
        
        return redirect()->route('areas.index');
    }



    public function edit()
    {
        $request = request();
        $areaId = $request->areas;
        $area = Area::find($areaId);
      
        
        return view('admins.areas.edit',[
           
            'areas' => $area
        ]);
    }


    public function update($areaId)
    {
        
        Area::where('id', $areaId)->first()->update(request()->all());
        
        return redirect()->route('areas.index');
    }

}
