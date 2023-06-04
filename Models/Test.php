<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function testable()
    {
        return $this->morphTo();
    }

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }
    
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function banqueQuestion()
    {
        return $this->belongsTo(BanqueQuestion::class);
    }
    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }




    


}
