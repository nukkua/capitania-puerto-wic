<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCapitaniaPuerto extends FormRequest
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
            'nombre_capitania' => 'required|string|max:255',
            'nombre_terminal_portuaria' => 'required|string|max:255',
            'fecha' => 'required|date',
            'matricula' => 'required|string|max:255',
            'tipo_carga' => 'required|string|max:255',
            'toneladas' => 'required|numeric|min:0',
            'fecha_ingreso_muelle' => 'required|date',
            'fecha_salida_muelle' => 'required|date|after_or_equal:fecha_ingreso_muelle',
            'fecha_inicio_operacion' => 'required|date',
            'fecha_fin_operacion' => 'required|date|after_or_equal:fecha_inicio_operacion',
            'horas_permanencia' => 'required|date_format:H:i:s',
            'horas_paralizacion' => 'required|date_format:H:i:s',
            'horas_amarre' => 'required|date_format:H:i',
            'horas_des_amarre' => 'required|date_format:H:i',
            'tiempo_disponible_en_muelle' => 'required|date_format:H:i:s',
            'metros_lineales_muelle' => 'required|string|max:255',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre_capitania.required' => 'El nombre de la capitanía es obligatorio.',
            'nombre_terminal_portuaria.required' => 'El nombre de la terminal portuaria es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.',
            'matricula.required' => 'La matrícula es obligatoria.',
            'tipo_carga.required' => 'El tipo de carga es obligatorio.',
            'toneladas.required' => 'Las toneladas son obligatorias.',
            'toneladas.numeric' => 'Las toneladas deben ser un valor numérico.',
            'fecha_ingreso_muelle.required' => 'La fecha de ingreso al muelle es obligatoria.',
            'fecha_salida_muelle.required' => 'La fecha de salida del muelle es obligatoria.',
            'fecha_salida_muelle.after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de ingreso.',
            'fecha_inicio_operacion.required' => 'La fecha de inicio de la operación es obligatoria.',
            'fecha_fin_operacion.required' => 'La fecha de fin de la operación es obligatoria.',
            'fecha_fin_operacion.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'horas_permanencia.required' => 'Las horas de permanencia son obligatorias.',
            'horas_paralizacion.required' => 'Las horas de paralización son obligatorias.',
            'horas_amarre.required' => 'Las horas de amarre son obligatorias.',
            'horas_des_amarre.required' => 'Las horas de desamarre son obligatorias.',
            'tiempo_disponible_en_muelle.required' => 'El tiempo disponible en el muelle es obligatorio.',
            'metros_lineales_muelle.required' => 'Los metros lineales del muelle son obligatorios.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'La validacion fallo.',
            'errors' => $validator->errors(),
        ], 403));
    }
}
