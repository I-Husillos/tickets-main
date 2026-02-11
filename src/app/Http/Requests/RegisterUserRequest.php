<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
                'regex:/(.+)@(.+)\.(.+)/i' // Fuerza a que haya un punto en la parte del dominio
            ],
            'password' => 'required|string|confirmed|min:3',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Este correo ya está registrado. Por favor, inicia sesión o usa otro correo.',
            'email.regex' => 'El correo debe contener un dominio válido (ej. .com, .es).',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
