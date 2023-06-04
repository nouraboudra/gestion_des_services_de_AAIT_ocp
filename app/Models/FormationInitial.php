<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationInitial extends Model
{
    use HasFactory;

    public function formation()
    {
        return $this->morphOne(Formation::class, 'formationable');
    }
}
