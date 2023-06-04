<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'type',
        'fichier',
        'approuved_by_chef_domain',
    ];


    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function formateurs()
    {
        return $this->belongsTo(Formateur::class);
    }
    
}

