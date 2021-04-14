<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:4', 'unique:categories'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
            'image' => ['mimes:jpeg,jpg,png,gif|required|max:10000'],
        ];
    }
}
