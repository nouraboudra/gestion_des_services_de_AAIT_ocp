<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanqueQuestion extends Model
{
    use HasFactory;

    public function test()
    {
        return $this->hasMany(Test::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
