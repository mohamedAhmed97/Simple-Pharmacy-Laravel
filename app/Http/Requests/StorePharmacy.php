<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePharmacy extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "ph_name"=>'required|max:255',
            "ph_avatar"=>' mimes:jpeg,bmp,png,webp|required',
            "ph_area"=>'required',
            "name"=>'required|max:255',
            "email"=>'email|required|unique:doctors',
            "pwd"=>'required',
            "nationalID"=>'required|numeric'

        ];
    }


    public function message()
    {
        return [
            "ph_name.max"=>'You Wrote Very Long Name',
            "ph_avatar.mimes"=>'You Should Upload Picture',
            "ph_avatar.required"=>'You Should Upload Picture',
            "email.unique"=>'The Email Aleardy Existing',
            "nationalID.numeric"=>'Please Enter Current ID'
        ];
    }
}
