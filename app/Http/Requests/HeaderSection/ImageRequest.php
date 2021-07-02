<?php

namespace App\Http\Requests\HeaderSection;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'person_gif' => 'nullable|dimensions:min_width=350,min_height=600',
            'background_image' => 'nullable|dimensions:min_width=6000,min_height=3000',
            'coin_gif' => 'nullable|dimensions:min_width=400,min_height=400',
        ];
    }

    public function messages()
    {
        return [
            'person_gif.dimensions' => 'Invalid image Height & Width',
            'background_image.dimensions' => 'Invalid image Height & Width',
            'coin_gif.dimensions' => 'Invalid image Height & Width',
        ];
    }
}
