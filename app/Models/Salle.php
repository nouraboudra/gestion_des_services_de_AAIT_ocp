<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batiment;
use App\Models\TypesSalle;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'intitule', 'batiment' ,'typessalle'];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
    
    public function sessionFormations() {
        return $this->hasMany(SessionFormation::class);
    }
   
        public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'batiment_id');
    }

    public function typessalles() {
        return $this->belongsTo(TypesSalle::class, 'typesalle_id');
        
    }

}
