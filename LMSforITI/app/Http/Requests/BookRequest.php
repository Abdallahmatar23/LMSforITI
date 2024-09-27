<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required|unique:books,title,'.$this->book,
            'auther'=>'required',
            'body'=> 'required',
            'published_at'=> 'date_format:Y-m-d|before:today',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Name is required',
            'auther.required'=>'Auther name is required',
            'body.required'=>'Body content is required',
            'published_at.required'=>'Published year is required',
            'published_at.before'=>'Published year must be before this day',

        ];
    }
}
