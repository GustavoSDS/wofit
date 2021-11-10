<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'email', 'mensaje',
    ];
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
    ];
}
