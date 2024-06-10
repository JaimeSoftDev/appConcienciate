<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psh extends Model
{
    use HasFactory;
    protected $guarded = [];

    const SEXO = [
        'hombre' => 'hombre',
        'mujer' => 'mujer',
    ];
    const ESTADO_CIVIL = [
        'casado' => 'casado',
        'soltero' => 'soltero',
        'otro' => 'otro',
    ];
    public function cama()
    {
        return $this->hasOne(Cama::class);
    }
    public function solicituds()
    {
        return $this->hasMany(Solicitud::class);
    }
    public function intervencions()
    {
        return $this->hasMany(Intervencion::class);
    }
}
