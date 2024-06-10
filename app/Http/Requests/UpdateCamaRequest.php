<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCamaRequest extends FormRequest
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

        $e = [
            'psh_id' => 'nullable|exists:pshes,id',
            'modulo' => 'string|required',
            'emergencia' => 'bool|required',
            'asignada' => 'bool|required',
        ];
        return $e;
    }
}
