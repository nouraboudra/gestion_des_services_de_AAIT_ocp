<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Panoscape\History\HasOperations;

class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use Notifiable;
  use HasRoles;
  use HasOperations;
  public function userable()
  {
    return $this->morphTo();
  }


  protected $fillable = [
    'email',
    'password',
    'prenom',
    'nom',
    'Matricule',
    'date_naissance',
    'date_embauche',
    'status',
  ];


  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected $casts = [
    'email_verified_at' => 'datetime',
  ];



  public function findForPassport($username)
  {
    return $this->where('matricule', $username)->first();
  }
}