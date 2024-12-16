<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapitaniaPuerto extends Model
{
    protected $fillable = [
        'nombre_capitania',
        'nombre_terminal_portuaria',
        'fecha',
        'matricula',
        'tipo_carga',
        'toneladas',
        'fecha_ingreso_muelle',
        'fecha_salida_muelle',
        'fecha_inicio_operacion',
        'fecha_fin_operacion',
        'horas_permanencia',
        'horas_paralizacion',
        'horas_amarre',
        'horas_des_amarre',
        'tiempo_disponible_en_muelle',
        'metros_lineales_muelle',
    ];
}
