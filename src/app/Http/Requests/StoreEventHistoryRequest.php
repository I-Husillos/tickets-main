<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventHistoryRequest extends FormRequest
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
            'event_type' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'event_type.required' => 'El tipo de evento es obligatorio.',
            'user.required' => 'El campo usuario es obligatorio.',
            'date.required' => 'La fecha es obligatoria.',
            'date.date' => 'La fecha no es válida.',
        ];
    }
}
