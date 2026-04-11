<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'alumno_id', 
        'psicologo_id', 
        'fecha', 
        'motivo', 
        'estado'
    ];

    public function alumno() {
        return $this->belongsTo(Usuario::class, 'alumno_id');
    }

    public function psicologo() {
        return $this->belongsTo(Usuario::class, 'psicologo_id');
    }
}
