<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
                'message' => 'required|string|min:1|max:1000',
            ];
    }
    
    public function messages(): array
    {
        return [
            'message.required' => 'El mensaje no puede estar vacío.',
            'message.min' => 'El mensaje debe tener al menos :min caracteres.',
            'message.max' => 'El mensaje no puede exceder los :max caracteres.',
        ];
    }
}
