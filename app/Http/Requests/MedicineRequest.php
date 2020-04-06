<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
                'medicine_name' => 'required|unique:medicines,id|min:3',
                'medicine_quantity' => 'required|numeric',
                'medicine_type' => 'required|min:4',
                'medicine_price' => 'required|numeric',  
        ];
    }

    public function messages()
    {
        return [
                'medicine_name.min' => 'Medicine name has minimum of 3 chars',
                'medicine_name.required' => 'Medicine name is required, you have to fill it!',
                'medicine_name.unique' => 'Medicine name is unique, you have to choose a different title!',
                'medicine_quantity.required' => 'Medicine quantity is required, you have to fill it!',
                'medicine_type.required' => 'Medicine type is required, you have to fill it!',
                'medicine_type.min' => 'The Type has minimum of 4 chars',
                'medicine_price.required'=>'Price is required, you have to fill it!',
        ];
    }
}
