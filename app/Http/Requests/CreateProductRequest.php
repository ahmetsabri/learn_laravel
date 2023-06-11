<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'timezone' => ['timezone:Per_country,US']
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "products.*.colors.*.sizes.*.name" =>[
    //             'required_with' => "Size Name Must be provided when sizes provided"
    //         ]
    //     ];
    // }

    public function attributes()
    {
        return [
            'products.*.colors.*.sizes.*.name' => 'size name',
            'products.*.colors.*.sizes.*.quantity' => 'size quantity',
        ];
    }
}
