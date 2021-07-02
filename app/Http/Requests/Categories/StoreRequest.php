<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|unique:categories,title',
            'display_on_home' => 'nullable',
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Title is required.",
            'title.string' => 'Title must be string',
            'image.image' => 'Invalid image',
            'image.dimensions' => 'Invalid image dimension',
        ];
    }
}
