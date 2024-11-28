<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mezcal_id', 'quantity'];

    public function mezcal()
    {
        return $this->belongsTo(Mezcal::class);
    }
}
