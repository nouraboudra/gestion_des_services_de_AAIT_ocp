<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestEntreeSortie extends Model
{
    use HasFactory;
    public function test()
    {
        return $this->morphOne(Test::class, 'testable');
    } 



}
