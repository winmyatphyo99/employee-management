<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email',
            'phone' => 'nullable|regex:/^[0-9+\-\s]{7,20}$/',
            'address'    => 'nullable|string',
            'salary' => 'required|numeric|min:0',
        ];
    }
}
