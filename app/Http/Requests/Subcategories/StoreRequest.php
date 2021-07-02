<?php

namespace App\Http\Requests\Subcategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|numeric',
            'title' => [
                'required',
                'string',
                Rule::unique('sub_categories')
                    ->where(function ($query){
                        return $query
                            ->where('title', $this->title)
                            ->where('category_id', $this->category_id);
                    })
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Title is required.",
            'title.string' => "Title must be string.",
            'title.unique' => "Title has already been taken.",
            'category_id.required' => "Category is required.",
            'category_id.numeric' => "Invalid category.",
        ];
    }
}
