<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Models\CandidatEcosysteme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginBasic extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      /** @var \App\Models\User */ //this code for preventing the error : Undefined method 'hasRole'
      $user = Auth::user();
      if ($user->hasRole("candidat_ecosystem")) {
        $ecosystemUser = CandidatEcosysteme::where('cin', $user->matricule)->first();
        if ($ecosystemUser && $ecosystemUser->first_time) {
          return redirect()->route('register')->with('userId', $user->id);
        }
      }
      return redirect()->intended('dashboard');
    }
    return view('content.authentications.auth-login-basic');
  }
  public function authenticate(Request $request)
  {
    $rules = [
      'matricule' => ['required'],
      'password' => ['required']
    ];
    $messages = [
      'matricule.required' => "Le champ Matricule est obligatoire.",
      'password.required' => "Le champ Mot de passe est obligatoire."
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {

      $errors = $validator->errors()->all();

      foreach ($errors as $error) {
        toastr()->error($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $userId = $request->input('matricule');
    $user = User::where('Matricule', $userId)->first(); //to do
    $credentials = $request->only('matricule', 'password');
    $rememberMe = $request->filled('remember-me');


    if (Auth::attempt($credentials, $rememberMe)) {
      $user = Auth::user();
      $candidat_ecosysteme = CandidatEcosysteme::where('cin', $user->Matricule)->first();
      if ($candidat_ecosysteme && $candidat_ecosysteme->first_time) {

        return redirect()->route('register')->with('userId', $userId);
      }
      $request->session()->regenerate();
      auth()->login($user);
      toastr()->success('Bienvenue ' . Auth::user()->nom);
      return redirect()->intended('dashboard');
    }
    toastr()->error('verifier votre crédentiel');

    return redirect()->route("auth-login-basic")->with('errors', "verifier votre crédentiel");
  }

  public function username()
  {
    return 'Matricule';
  }
}