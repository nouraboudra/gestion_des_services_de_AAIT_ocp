<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    
    protected $fillable = ['nom','chefDomain_id'];

    public function formateurs() {
        return $this->belongsToMany(Formateur::class);
    }
    
    public function sousDomain() {
        return $this->hasMany(SousDomain::class);
    }
    
    public function theme() {
        return $this->hasMany(Theme::class);
    }
    
    public function chefDomain() {
        return $this->hasOne(ChefDomain::class);
    }
    
   
}
