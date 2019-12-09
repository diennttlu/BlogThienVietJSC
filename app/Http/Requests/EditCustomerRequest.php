<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCustomerRequest extends FormRequest
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
    public function rules ()
    {
        return [
            //
            'fileEdit' => 'mimes:png,jpg,PNG,jpeg,gif',
            'nameEdit' => 'required',
            'addressEdit' => 'required',
            'aboutmeEdit' => 'required'
        ];
    }
    public function messages ()
    {
        return [
          'required' => ' enter  :attribute ',
            'mimes' => 'enter :attribute '
        ];
    }
    public function attributes()
    {
        return [
            'fileEdit' => 'image',
            'nameEdit' => 'full name',
            'addressEdit' => 'location',
            'aboutmeEdit' => 'description'
        ];
    }
}
