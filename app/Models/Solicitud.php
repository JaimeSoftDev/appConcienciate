<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $guarded = [];
    const ESTADOS = [
        'solicitado' => 'solicitado',
        'proceso' => 'proceso',
        'realizado' => 'realizado',
    ];
    public function psh()
    {
        return $this->belongsTo(Psh::class);
    }
}
