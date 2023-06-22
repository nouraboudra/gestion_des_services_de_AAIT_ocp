<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'domain_id'];

    public function domain() {
        return $this->belongsTo(Domain::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }
    
    public function documents() {
        return $this->hasMany(Document::class);
    }
    
    public function planFormations() {
        return $this->belongsToMany(Formation::class);
    }
    
}
