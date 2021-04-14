<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'title' => ['required', 'string', 'min:5'],
            'text' => ['required', 'max:1000'],
            'age' => ['required', 'integer', 'min:18', 'max: 100'],
            'category_id' => ['required', 'string'],
            'photo1' => ['mimes:jpeg,jpg,png,gif|required|max:10000'],
            'photo2' => ['mimes:jpeg,jpg,png,gif|max:10000'],
            'photo3' => ['mimes:jpeg,jpg,png,gif|max:10000'],
        ];
    }
}
