<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'=>'required',
            'mobile'=>'required|numeric',
            'image'=> 'mimes:jpeg,jpg,png,gif|max:1000',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Name is required',
            'mobile.required'=>'Mobile Number is required',
            'mobile.numeric'=>' Valid mobile number is required',
            'image.image'=>'Valid Image is required'
        ];
    }
}
