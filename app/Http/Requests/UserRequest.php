<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules = [

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . (isset($this->route('user')->id) ? $this->route('user')->id : ''),
            'role' => 'required|exists:roles,name',
            'password' => 'required|string|min:8',
        ];

        if ($this->isMethod('put')) {
            $rules['password'] = 'nullable|string|min:8';
        }

        return $rules;
    }
}
