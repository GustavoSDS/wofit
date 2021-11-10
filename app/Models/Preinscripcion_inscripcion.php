<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion_inscripcion extends Model
{
    use HasFactory;
/*     protected $fillable = [
        'dni', 'nombre', 'apellido', 'email', 'telefono', 'instagram'
    ]; */
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function fechas()
    {
        return $this->belongsTo(Preinscripcion_fecha::class);
    }

    public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function setNameUpperAttribute($value)
    {
        return strtoupper($value);
    }
}
