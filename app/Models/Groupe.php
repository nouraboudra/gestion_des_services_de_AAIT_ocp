<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'capacite'];

    public function candidats() {
        return $this->belongsToMany(Candidat::class);
    }
    
    public function sessionFormations() {
        return $this->hasMany(SessionFormation::class);
    }
}
