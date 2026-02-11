<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'El mensaje es obligatorio.',
            'message.string' => 'El mensaje debe ser una cadena de texto.',
            'message.max' => 'El mensaje no puede tener más de 1000 caracteres.',
        ];
    }
}
