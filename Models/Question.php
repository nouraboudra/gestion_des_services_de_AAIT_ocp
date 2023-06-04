<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['score'];


    public function banqueQuestions()
    {
        return $this->belongsToMany(BanqueQuestion::class);
    }

    public function questionFichier()
    {
        return $this->hasOne(QuestionFichier::class);
    }

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
}
