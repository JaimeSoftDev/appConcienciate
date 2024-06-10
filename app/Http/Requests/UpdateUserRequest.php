<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')->id;
        return [
            'nombre' => 'required|string|max:50',
            'apellido1' => 'required|string|max:50',
            'apellido2' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email,' . $userId,
            'dni' => 'required|string|regex:/^\d{8}[a-zA-Z]$/|unique:users,dni,' . $userId,
        ];
    }
}
