<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatEcosysteme extends Model
{
    use HasFactory;
    protected $fillable = [
        'CIN',
        'Entreprise_actuelle',
        'Poste_actuellement_occupe',
        'Type_contrat',
        'Anciennete',
        'annees_experience',
        'Niveau_scolaire',
        'Diplôme',
        'Spécialité',
        'Societe',
        'Organismes_de_diplôme',
        'formations',
        'Organisme_de_formation',
        'Langues',
        'first_time',
    ];
    public function candidat()
    {
        return $this->morphOne(Candidat::class, 'candidatable');
    }
}  