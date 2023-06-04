<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function ficheSatisfaction()
    {
        return $this->hasMany(FicheSatisfaction::class);
    }

    public function sessionFormations()
    {
        return $this->belongsToMany(SessionFormation::class);
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
