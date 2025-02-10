<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ime kategorije je obavezno.',
            'parent_id.exists' => 'Roditeljska kategorija mora biti važeća kategorija.',
        ];
    }
}
