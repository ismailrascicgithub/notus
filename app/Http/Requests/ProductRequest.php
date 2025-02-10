<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        // Ako želiš da omogućiš samo autorizovane korisnike da kreiraju/menjaju proizvode
        return true;
    }

    public function rules()
    {
        return [
             'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|array',
         ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'price.required' => 'Price is required.',
            'images.*.image' => 'Each image must be a valid image file.',
        ];
    }
}
