<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesSalle extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function salles()
    {
        return $this->hasMany(Salle::class, 'typesalle_id');
    }
}
