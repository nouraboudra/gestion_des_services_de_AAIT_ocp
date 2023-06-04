<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefFormation extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }
}
