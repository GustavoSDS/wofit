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

    public function inscriptos(){
        return $this->hasMany(Preinscripcion_inscripcion::class);
        // return $this->belongsTo('App\Models\Preinscripcion_inscripcion', 'preinscripcion_fecha_id', 'id');
    }
    public function getFullDateAttribute()
    {
        return $this-> dia.'/'. $this->mes.'/'.$this->ano;
    }
}
