<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'motif', 'candidat_id'];
    public function candidat() {
        return $this->belongsTo(Candidat::class);
    }
    
    public function sessionFormation() {
        return $this->belongsTo(SessionFormation::class);
    }
}
