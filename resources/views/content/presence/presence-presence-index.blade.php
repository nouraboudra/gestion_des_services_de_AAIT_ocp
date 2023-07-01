@extends('layouts/contentNavbarLayout')

@section('title', 'Présence ')

@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion de Présence /</span> Présence Session {{ $sessionCount }}
        {{ $session->formation->Intitulé }}
    </h4>
    @if ($session)

        <div class="container mt-4">
            <!-- First Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-header">{{ $session->groupe->nom }} </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Space Here -->
            <div class="my-4"></div>

            <!-- 3 Section -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="button-wrapper">
                                    <button type="button" class="btn btn-primary me-2 mb-4" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Nouveau Candidat</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Action</th>
                                            <th>Motif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($candidats as $member)
                                            <tr>

                                                <td>{{ $member->user->id }}</td>
                                                <td>{{ $member->user->nom }}</td>
                                                <td>{{ $member->user->prenom }}</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="action1"
                                                            id="actionPresent1" value="present">
                                                        <label class="form-check-label" for="actionPresent1">Present</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="action1"
                                                            id="actionAbsent1" value="absent">
                                                        <label class="form-check-label" for="actionAbsent1">Absent</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="action1"
                                                            id="actionJustification1" value="absent_with_justification">
                                                        <label class="form-check-label" for="actionJustification1">Absent
                                                            with
                                                            Justification</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="motif1">
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <p align="center"> pas de candidat dans cette session</p>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
        <p align="center">pas de session aujourd'hui</p>

    @endif

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau Candidat au groupe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form -->
                <form method="POST" action="">
                    @csrf
                    <div class="modal-body">
                        <!-- Id -->
                        <div class="mb-3">
                            <label for="Id" class="form-label">ID</label>
                            <input type="text" id="Id" class="form-control" name="Id"
                                placeholder="Entrez ID">
                        </div>
                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" id="nom" class="form-control" name="nom"
                                placeholder="Entrez Nom">
                        </div>
                        <!-- prenom -->
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" id="prenom" class="form-control" name="prenom"
                                placeholder="Entrez Prenom">
                        </div>

                        <!-- Domaine ID -->
                        <div class="mb-3">
                            <label for="domain_id" class="form-label">Groupe</label>
                            <select class="form-select" disabled id="Groupe_id" name="Groupe_id">
                                <option value="">{{ $session->groupe->nom }}</option>
                            </select>
                        </div>
                        <input type="text" hidden id="groupe_id" class="form-control" name="groupe_id"
                            value="{{ $session->groupe->id }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
