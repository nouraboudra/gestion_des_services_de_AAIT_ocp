<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }


  public function authenticate(Request $request)
  {
    validator(request()->all(),[
      'ID'=>['required'],
      'password'=>['required']
    ])->validate();
      $id = $request->input('ID');
      $password = $request->input('password');
      $rememberMe = $request->filled('remember-me');

      if(auth()->attempt([$id, $password], $rememberMe)){
        return redirect()->route('dashboard-analytics');
      }
      return redirect()-back()->withErrors("verifier votre crédentiel");
  }

  public function username(){
    return 'matricule';
  }
}
