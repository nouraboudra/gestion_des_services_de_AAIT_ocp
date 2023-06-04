@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-md">
  <div class="authentication-wrapper container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand" style="display: flex; justify-content: center;">
            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                <span class="demo mx-auto d-block">
                    <img src="{{ asset('assets/img/app/logo.png') }}" alt="Logo" style="width: 50%; display: block; margin: 0 auto;">
                </span> 
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Inscrivez-vous</h4>

          <form id="formAuthentication" class="mb-3" action="{{ route('auth-register-basic') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="mb-3">
                <label for="CIN" class="form-label">CIN</label>
                <input type="text" required class="form-control" id="CIN" name="CIN" placeholder="Entrez votre CIN" autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Mot de passe</label>
                <div class="input-group input-group-merge">
                    <input type="password" required id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Type_contrat" class="form-label">Type de contrat</label>
                    <select class="form-select" required id="Type_contrat" name="Type_contrat">
                        <option value="" selected disabled>Choisissez une option</option>
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                        <option value="Stage">Stage</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <input type="text" class="form-control mt-2" id="Type_contrat_autre" name="Type_contrat_autre" placeholder="Entrez autre type de contrat" style="display: none;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Niveau_scolaire" class="form-label">Niveau scolaire</label>
                    <select class="form-select" id="Niveau_scolaire" name="Niveau_scolaire">
                        <option value="" selected disabled>Choisissez une option</option>
                        <option value="Primaire">Primaire</option>
                        <option value="Collège">Collège</option>
                        <option value="Lycée">Lycée</option>
                        <option value="Université">Université</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <input type="text" class="form-control mt-2" id="Niveau_scolaire_autre" name="Niveau_scolaire_autre" placeholder="Entrez autre niveau scolaire" style="display: none;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Diplôme" class="form-label">Diplôme</label>
                    <select class="form-select" id="Diplôme" name="Diplôme">
                        <option value="" selected disabled>Choisissez une option</option>
                        <option value="Bac">Bac</option>
                        <option value="Licence">Licence</option>
                        <option value="Master">Master</option>
                        <option value="Doctorat">Doctorat</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <input type="text" class="form-control mt-2" id="Diplôme_autre" name="Diplôme_autre" placeholder="Entrez autre diplôme" style="display: none;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Spécialité" class="form-label">Spécialité</label>
                    <select class="form-select" id="Spécialité" name="Spécialité">
                        <option value="" selected disabled>Choisissez une option</option>
                        <option value="Informatique">Informatique</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Ressources humaines">Ressources humaines</option>
                        <option value="Autre">Autre</option>
                    </select>
                    <input type="text" class="form-control mt-2" id="Spécialité_autre" name="Spécialité_autre" placeholder="Entrez autre spécialité" style="display: none;">
                </div>
            </div>
            <div class="mb-3">
                <label for="Langues" class="form-label">Langues</label>
                <select class="form-select" id="Langues" name="Langues">
                    <option value="" selected disabled>Choisissez une option</option>
                    <option value="Français">Français</option>
                    <option value="Arabe">Arabe</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Autre">Autre</option>
                </select>
                <input type="text" class="form-control mt-2" id="Langues_autre" name="Langues_autre" placeholder="Entrez autre langue" style="display: none;">
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                    <label class="form-check-label" for="terms-conditions">
                        J'accepte les
                        <a href="javascript:void(0);">politique de confidentialité et les conditions</a>
                    </label>
                </div>
            </div>
            <button class="btn btn-primary d-grid w-100">
                S'inscrire
            </button>
        </form>
        
        
        
        

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{url('auth/login-basic')}}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
<script src="{{ asset('assets/js/form-registration.js') }}"></script>

@endsection
