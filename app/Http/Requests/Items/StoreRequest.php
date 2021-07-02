<?php

namespace App\Http\Requests\Items;

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
            'unit_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'origin_id' => 'required|numeric',
            'category_id' => 'required|string',

            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|required_with:discount_type',
            'discount_type' => 'nullable|in:percent,amount|required_with:discount',
            'opening_balance' => 'required|numeric',
            'name' => ['required', 'string',
                Rule::unique('items')
                    ->where(function ($query) {
                        return $query
                            ->where('name', $this->name)
                            ->where('category_id', $this->category_id)
                            ->where('origin_id', $this->origin_id)
                            ->where('brand_id', $this->brand_id);
                    })],
            'feature_image' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'images.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => "Unit is required.",
            'unit_id.numeric' => "Invalid unit.",
            'brand_id.required' => "Brand is required.",
            'brand_id.numeric' => "Invalid brand.",
            'origin_id.required' => "Origin is required.",
            'origin_id.numeric' => "Invalid origin.",
            'category_id.required' => "Category is required.",
            'category_id.string' => "Invalid category.",

            'price.required' => "Price is required.",
            'price.numeric' => "Invalid price.",
            'discount.numeric' => "Invalid discount.",
            'discount.required_with' => "Discount is required.",
            'discount_type.required_with' => "Discount type is required.",
            'opening_balance.required' => "Opening balance is required.",
            'opening_balance.numeric' => "Invalid opening balance.",
            'name.required' => "Name is required.",
            'name.string' => 'Name must be string.',
            'name.unique' => 'Name has already been taken.',
            'feature_image.image' => 'Invalid image.',
            'feature_image.dimensions' => 'Invalid image dimension.',
            'images.*.image' => 'Each one must be a valid image.',
            'images.*.dimensions' => 'Each one must meet required dimension.',
        ];
    }
}
