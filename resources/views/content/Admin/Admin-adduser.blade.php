@extends('layouts/contentNavbarLayout')

@section('title', 'Créer utilisateur')

@section('page-script')
<script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Gestion des Utilisateurs /</span> Ajouter un nouveau Utilisateur
</h4>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body">
                    <!-- HTML5 Inputs -->
                    <form id="Adduser" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="matricule" class="form-label">Matricule</label>
                                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule de l'utilisateur" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email de l'utilisateur" autofocus>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom de l'utilisateur" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'utilisateur" autofocus>
                            </div>

                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mot de passe</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input class="form-control" required type="date"  name="date_naissance" id="date_naissance" />
                            </div>
                            <div class="col-md-6">
                                <label for="date_embauche" class="form-label">Date d'embauche</label>
                                <input class="form-control" required type="date" name="date_embauche" id="date_embauche" />
                            </div>
                        </div>
                        @if(sizeof($roles)>0)                                        
                        <div class="card mb-4">
                            <h5 class="card-header">Roles</h5>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($roles as $role)
                                    <div class="col-md-4">
                                        <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" id="role-{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                                            <label class="form-check-label" name="" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100 custom-btn" type="submit" style="background-color: #002A5C;">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>











@endsection
