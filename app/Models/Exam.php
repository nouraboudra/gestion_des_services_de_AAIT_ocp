<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function Domaine()
    {
        return $this->belongsTo('App\Models\Domaine', 'Domaine_id');
    }

    public function Theme()
    {
        return $this->belongsTo('App\Models\Theme', 'Theme_id');
    }
}
