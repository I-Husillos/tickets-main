<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
        $typeId = $this->route('type')->id;

        return [
            'name' => 'required|string|max:255|unique:types,name,' . $typeId,
            'description' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Ya existe un tipo con ese nombre.',
            'name.required' => 'El campo nombre es obligatorio.',
        ];
    }
}
