<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Intitulé',
        'date_debut',
        'date_fin',
        'theme_id',
        'planificateur_id',
        'formationable_type',
        'formationable_id'
    ];

    public function formationable()
    {
        return $this->morphTo();
    }

    public function sessionFormations()
    {
        return $this->hasMany(SessionFormation::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function candidats(): BelongsToMany
    {
        return $this->belongsToMany(Candidat::class, 'candidat_formation', 'formation_id', 'candidat_id');
    }

    public function ficheSatisfactions()
    {
        return $this->hasMany(FicheSatisfaction::class);
    }

    public function planificateur()
    {
        return $this->belongsTo(Planificateur::class);
    }
    public function theme()
    {
        return $this->belongsToMany(Theme::class);
    }

}