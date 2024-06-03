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
        return auth()->user()->hasRoles('admin');
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
            'aplelido1' => 'required|string|max:50',
            'aplelido2' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users, email,' . $this->user->email,
            'password' => 'required|string|min:6|',
            'dni' => 'required|string|regex:/^\d{8}[a-zA-Z]$/|unique:users, dni,' . $this->user->dni,
        ];
    }
}
