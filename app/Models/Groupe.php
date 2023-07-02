<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Panoscape\History\HasHistories;

class Groupe extends Model
{
    use HasFactory;
    use HasHistories;


    protected $fillable = ['nom', 'capacite', 'type'];

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class);
    }

    public function sessionFormations()
    {
        return $this->hasMany(SessionFormation::class);
    }

    public function getModelLabel()
    {
        return $this->nom;
    }
}