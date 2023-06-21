<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatOcp extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code_Emploi',
        'Libelle_Code_Emploi',
        'Niveau_code_Emploi',
        'GROUPE_Professionnel',
        'service',
        'Direction',
        'Societe',
        'Matricule'
    ];

    public function candidat()
    {
        return $this->morphOne(Candidat::class, 'candidatable');
    }
}
