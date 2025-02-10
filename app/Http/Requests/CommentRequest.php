<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id', 
            'author_name' => 'nullable|string|max:255',
            'content' => 'required|string|max:1000',
            'rating' => 'integer|min:0|max:5',
        ];
    }
}
