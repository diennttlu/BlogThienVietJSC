<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'file' => 'mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'address' => 'required',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|min:8|max:16',
            'repassword' => 'same:password',
            'aboutme' => 'required'

        ];
    }
    public function messages()
    {
      return [
          'mimes' => 'Enter :attribute',
          'required' => 'Enter :attribute ',
          'unique ' => ':attribute already exists',
          'min' => ':attribute  must be at least :min characters',
          'max' => ':attribute must be less than :max characters',
          'same' => 'The two passwords do not match'
      ];
    }
    public function attributes()
    {
       return [
           'file'=>'image',
           'name'=>'full name',
           'address'=>'location',
           'password'=>'password',
           'repassword'=>'repassword',
           'aboutme'=>'description',
       ];
    }
}
