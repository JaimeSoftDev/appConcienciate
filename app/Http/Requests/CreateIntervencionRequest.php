<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIntervencionRequest extends FormRequest
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
            'psh_id' => 'required|integer|exists:pshes,id',
            'campo' => 'required|string|in:psicologia, trabajo_social, dispositivo_acogida',
            'area' => 'required|string|in:social, economica, laboral, vivienda, saniaria, incidencia, observación',
            'descripcion' => 'required|string|max:255',
            'fecha' => 'required|date',
        ];
    }
}
