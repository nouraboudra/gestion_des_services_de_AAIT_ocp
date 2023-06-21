<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlanFormation extends Model
{
    use HasFactory;
    protected $fillable = ['date_debut', 
    'date_fin'];

   

    public function sessionFormations() {
        return $this->hasMany(SessionFormation::class);
    }
    
    public function ficheSatisfactions() {
        return $this->hasMany(FicheSatisfaction::class);
    }
    
    public function planificateur() {
        return $this->belongsTo(Planificateur::class);
    }
    public function formation() : HasOne
    {
        return $this->hasone(Formation::class);
    }
    public function theme()
    {
        return $this->belongsToMany(Theme::class);
    }
}
