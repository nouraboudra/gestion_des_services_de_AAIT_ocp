<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheSatisfaction extends Model
{
    use HasFactory;

    protected $fillable = ['plan_formation_id'];

   

    public function formateur() {
        return $this->belongsTo(Formateur::class);
    }
    
    public function formation() {
        return $this->belongsTo(Formation::class);
    }

    
}
