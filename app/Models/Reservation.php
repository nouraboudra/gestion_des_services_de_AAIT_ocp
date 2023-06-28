<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  use HasFactory;
  protected $fillable = ['date_debut', 'date_fin', 'salle_id', 'responsable_logistique_user_id'];

  public function responsableLogistique()
  {
    return $this->belongsTo(ResponsableLogistique::class);
  }

  public function salle()
  {
    return $this->belongsTo(Salle::class);
  }
}