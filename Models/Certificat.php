<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nom',
        'date_obtention',
        'chef_formation_id',
        'candidat_id',
        'formation_id',
    ];

    public function chefFormation()
    {
        return $this->belongsTo(ChefFormation::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }
}
