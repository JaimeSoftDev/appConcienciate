<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psh extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cama()
    {
        $this->hasOne('cama');
    }
    public function solicituds()
    {
        $this->hasMany('solicitud');
    }
    public function intervencions()
    {
        $this->hasMany('intervencion');
    }
}
