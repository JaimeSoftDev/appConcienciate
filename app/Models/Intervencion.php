<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervencion extends Model
{
    use HasFactory;
    protected $guarded = [];
    const CAMPOS = [
        'psicologia' => 'Psicologia',
        'trabajo_social' => 'Trabajo Social',
        'dispositivo_acogida' => 'Dispositivo de Acogida',
    ];
    const AREAS = [
        'social' => 'Social',
        'economica' => 'Economica',
        'laboral' => 'Laboral',
        'vivienda' => 'Vivienda',
        'sanitaria' => 'Sanitaria',
        'incidencia' => 'Incidencia',
        'observación'   => 'Observación',
    ];
    public function psh()
    {
        return $this->belongsTo(Psh::class);
    }
}
