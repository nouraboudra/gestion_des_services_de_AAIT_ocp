<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'capacite'];

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
    
    public function sessionFormations() {
        return $this->hasMany(SessionFormation::class);
    }
}
