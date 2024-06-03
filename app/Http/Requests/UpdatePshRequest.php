<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePshRequest extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'aplelido1' => 'required|string|max:50',
            'aplelido2' => 'required|string|max:50',
            'email' => 'string|email|max:50|unique:pshes, email,' . $this->psh->email,
            'dni' => 'required|string|regex:/^\d{8}[a-zA-Z]$/|unique:pshes, dni,' . $this->psh->dni,
            'sexo' => 'required|string|email|in:hombre,mujer',
            'estado_civil' => 'required|string|in:casado,soltero,otro',
        ];
    }
}
