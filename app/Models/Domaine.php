<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domaine extends Model
{

    protected $fillable = ['Name', 'Responsable'];

    protected $table = 'Domaines';
    public $timestamps = true;

    public function Themes()    {
        return $this->HasMany('App\Models\Theme', 'Domaine_id');
    }
}
