<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'calories' => 'integer',
            'ingredients' => 'required|text',
            'image' => 'string',
            'price' => 'integer'
        ];
    }

    public function failedValidation(Validator $validator)

    {
        $data = $validator->errors();
        $message = 'Inputs are not Valid';
        throw new HttpResponseException(response()->result($data,$message));

    }

    public function filters()
    {
        return [
            'name' => 'lowercase',
            'ingredients' => 'lowercase'
        ];
    }
}
