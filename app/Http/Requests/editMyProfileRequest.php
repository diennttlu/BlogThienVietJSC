<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editMyProfileRequest extends FormRequest
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
            'full_name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,PNG,jpeg,gif'
        ];
    }
    public function messages()
    {
       return [
           'required' => ' Enter :attribute',
           'mimes' => 'enter :attribute'
       ];
    }
    public function attributes()
    {
       return [
           'full_name' => 'Full name',
           'location' => 'Location',
           'description' => 'Description',
           'image' => 'Image'
       ];
    }
}
