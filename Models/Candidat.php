<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{

    use HasFactory;
    
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function candidatable()
    {
        return $this->morphTo();
    }
        
    public function certificates() {
        return $this->hasMany(Certificate::class);
    }
    
    public function absences() {
        return $this->hasMany(Absence::class);
    }
    
    public function groupe() {
        return $this->belongsToMany(Groupe::class);
    }



}
