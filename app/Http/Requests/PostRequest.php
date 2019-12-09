<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
            'categories' => 'required',
            'title' => 'required|min:6|unique:posts,title,'.$this->id,
            'content'    => 'required',
            'tags'       => 'required'
        ];
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please enter the post title',
            'title.min' => 'The title must be at least 6 characters',
            'title.unique' => 'This title already exists',
            'categories.required' => 'Please enter the post category',
            'content.required' => 'Please enter the post content',
            'tags.required' => 'Please enter the post tag',
        ];
    }
}
