<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAdminRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'passwordAdmin' => 'required | min:5 | max: 16',
            'repasswordAdmin' => 'same:passwordAdmin',
            'location'  => 'required',
            'full_name' => 'required'

        ];
    }
    public function messages()
    {
     return [
         'required' => 'Enter :attribute  ',
         'min' => ':attribute  must be at least :min characters',
         'max' => ':attribute  must be less than :max characters',
         'unique' => 'email already exists',
         'same' => 'The two passwords do not match'
     ];
    }
    public function attributes()
    {
       return [
           'email' => 'email address',
           'passwordAdmin' => 'password',
           'repasswordAdmin' =>'repassword',
           'full_name' => 'full_name',
           'location' => 'location'
       ];
    }
}
