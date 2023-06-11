<?php

namespace App\Http\Requests;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;

class SavePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    protected array $typeValidationRules = [];

    public function authorize(): bool
    {
        return true;
    }

    function prepareForValidation()
    {
        $validationRules = Type::findOrFail($this->type_id)?->validations;

        $this->typeValidationRules = json_decode($validationRules, true);


        $this->merge([
            'allowed_values' => ( array_filter(explode(',', $this->input('allowed_values') ?? ''))) ?: null,
        ]);
    }


    public function rules(): array
    {
            return [
            'name' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'exists:types,id'],
            'value' => ($this->typeValidationRules),
            'allowed_values' => ['sometimes'],
        ];
    }

    // validation failed messages
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        dd($validator->errors());
    }
}
