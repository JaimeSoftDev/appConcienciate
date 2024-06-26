<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cama extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function psh()
    {
        return $this->belongsTo(Psh::class);
    }
}
