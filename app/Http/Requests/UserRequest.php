<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        //validation for user data
        return [
            'name'=>'required|min:3',
            'email'=> 'required|unique:users|email|regex:/(.+)@(.+)\.(.+)/i',
            'gender'=>'required|in:male,female',
            'password'=>'required',
            'date_of_birth'=>'required|nullable|date_format:Y-m-d|before:today',
            'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile_number'=>'required|numeric|digits:11',
            'national_id​'=>'required|numeric|digits:14',
            'area_id'=>'numeric|exists:areas,id',
            'street_name'=>'min:6|max:255',
            'building_number'=>'numeric',
            'floor_number'=>'numeric',
            'flat_number'=>'numeric',
            'is_main'=>'numeric',
        ];
    }

    public function messages()
    {
        return [
            'gender.in' => 'The gender must be male or female ONLY!', 
            'date_of_birth.date_format'=>'The date of birth does not match the format Y-m-d
                EX: 1997-02-26'    
        ] ;
    }
}
