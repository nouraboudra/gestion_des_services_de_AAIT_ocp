@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Gestion des candidats /</span> Candidats EcoSysteme
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link" href="{{ route("candidatOcp.index") }}"><i class="bx bx-user me-1"></i> Candidats OCP</a></li>
            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Candidats Ecosystème</a></li>
        </ul>
        <div class="card card-lg">
            <h5 class="card-header">Insertion des candidats</h5>
            <!-- insertion des candidats -->

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload un fichier Excel</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </label>
                    </div>
                    
                    <div class="button-wrapper">
                        <a href="{{ route('candidatEcosysteme.create') }}">
                            <button type="button" class="btn btn-primary me-2 mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"> Nouveau Utilisateur</span>
                            </button>
                        </a>
                    </div>
                    <div class="ms-auto ">
                        <a href="{{ route('download.example') }}" class="btn btn-primary me-2 mb5" target="_blank">
                            <span class="d-none d-sm-block">Voir exemple</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Entreprise Actuelle</th>
                            <th>Poste occupé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($candidats as $candidat)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $candidat->candidat->user->Matricule }}</strong></td>
                            <td>{{ $candidat->candidat->user->nom }}</td>
                            <td>{{ $candidat->candidat->user->prenom }}</td>
                            <td>{{ $candidat->candidat->user->email }}</td>
                            <td>{{ $candidat->Entreprise_actuelle }}</td>
                            <td>{{ $candidat->Poste_actuellement_occupe }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
            <!-- /insrtion candidat -->
        </div>
    </div>
</div>
@endsection
