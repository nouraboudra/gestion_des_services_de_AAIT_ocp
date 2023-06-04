<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationContinue extends Model
{
    use HasFactory;

    public function formation()
    {
        return $this->morphOne(Formation::class, 'formationable');
    }
}
