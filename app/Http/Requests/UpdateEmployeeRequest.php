<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'first_name' => 'sometimes|string|max:255',
            'last_name'  => 'sometimes|string|max:255',
            'email'      => 'sometimes|email|unique:employees,email,' . $id,
            'phone'      => 'sometimes|nullable|regex:/^[0-9+\-\s]{7,20}$/',
            'address'    => 'sometimes|nullable|string|max:500',
            'salary'     => 'sometimes|numeric|min:0',
        ];
    }
}
