<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mezcal extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente al nombre del modelo en plural
    protected $table = 'mezcales';

    // Los atributos que son asignables en masa
    protected $fillable = ['name', 'description', 'flavor', 'image'];
}
