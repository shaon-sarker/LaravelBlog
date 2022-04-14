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
        return [
            'category_id' => 'required',
            'post_heading' => 'required',
            'post_image' => 'required',
            'post_description' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category Name required',
            'post_heading.required' => 'Post Name required',
            'post_image.required' => 'Post Image required',
            'post_description.required' => 'Post Description required',

        ];
    }
}
