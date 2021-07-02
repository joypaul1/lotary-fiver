<?php

namespace App\Http\Requests\HeaderSection;

use Illuminate\Foundation\Http\FormRequest;

class LogoTitleRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required|string|',
            'logo' => 'nullable|dimensions:min_width=110,min_height=125',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Title is required.",
            'title.string' => 'Title must be string',
            // 'logo.image' => 'Invalid image',
            'logo.dimensions' => 'Invalid image Height & Width',
        ];
    }
}
