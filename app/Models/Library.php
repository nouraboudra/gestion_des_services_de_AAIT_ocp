<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table="library";

    public function Domaine()
    {
        return $this->belongsTo('App\Models\Domaine', 'Domaine_id');
    }

    public function Theme()
    {
        return $this->belongsTo('App\Models\Theme', 'Theme_id');
    }

}
