<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function candidats(): BelongsToMany
    {
        return $this->belongsToMany(Candidat::class, 'candidat_formation', 'formation_id', 'candidat_id');
    }

}
