<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function authenticate(Request $request)
  {
    validator(request()->all(), [
      'matricule' => ['required'],
      'password' => ['required']
    ])->validate();
    $credentials = $request->only('matricule', 'password');
    $rememberMe = $request->filled('remember-me');


    if (Auth::attempt($credentials, $rememberMe)) {

      toastr()->success('welcome '.Auth::user()->nom);
      return redirect()->route('dashboard-analytics');
    }
    toastr()->error('verifier votre crédentiel');

    return redirect()->route("auth-login-basic")->with('errors', "verifier votre crédentiel");
  }

  public function username()
  {
    return 'Matricule';
  }
}
