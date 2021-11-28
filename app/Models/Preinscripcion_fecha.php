<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion_fecha extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function inscriptos()
    {
        return $this->hasMany(Preinscripcion_inscripcion::class);
        // return $this->belongsTo('App\Models\Preinscripcion_inscripcion', 'preinscripcion_fecha_id', 'id');
    }
    public function getFullDateAttribute()
    {
        $cero = 0;
        switch (strlen($this->dia)) {
            case '1':
                $dia = $cero . $this->dia;
                break;
        
            default:
                $dia = $this->dia;
                break;
        }
        switch (strlen($this->mes)) {
            case '1':
                $mes = $cero . $this->mes;
                break;
        
            default:
                $mes = $this->mes;
                break;
        }

        return $this->ano . '-' . $mes . '-' . $dia;
    }
}
