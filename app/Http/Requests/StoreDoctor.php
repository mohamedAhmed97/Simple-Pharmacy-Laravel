<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctor extends FormRequest
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
           
            "avatar"=>' mimes:jpeg,jpg|required',
            "name"=>'required|max:255',
            "email"=>'email|required|unique:doctors',
            "password"=>'required|confirmed',
            "nationalID"=>'required|numeric'
        ];
    }


    public function message()
    {
        return [
            "avatar.mimes"=>'You Should Upload Picture',
            "avatar.required"=>'You Should Upload Picture',
            "email.unique"=>'The Email Aleardy Existing',
            "nationalID.numeric"=>'Please Enter Current ID'
        ];
    }
}
