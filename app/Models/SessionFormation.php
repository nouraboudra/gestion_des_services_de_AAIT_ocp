<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionFormation extends Model
{
    use HasFactory;

    protected $fillable = ['date_debut', 'date_fin'];

    public function groupe() {
        return $this->belongsTo(Groupe::class);
    }
    
    public function salle() {
        return $this->belongsTo(Salle::class);
    }
    
    public function planFormation() {
        return $this->belongsTo(PlanFormation::class);
    }
    
    
    public function absences() {
        return $this->hasMany(Absence::class);
    }

    public function formateurs()
    {
        return $this->belongsToMany(Formateur::class);
    }

}
