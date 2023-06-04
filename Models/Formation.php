<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['Intitulé', 'formationable_type', 'formationable_id'];

    public function formationable()
    {
        return $this->morphTo();
    }

    public function planFormation() {
        return $this->belongsTo(PlanFormation::class);
    }
    
    public function tests() {
        return $this->belongsToMany(Test::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
