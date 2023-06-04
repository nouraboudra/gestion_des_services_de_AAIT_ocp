<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefDomain extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
