@extends('layouts/contentNavbarLayout')

@section('title', 'Présence ')

@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Gestion de Présence /</span> Présence
</h4>

<div class="container mt-4">
    <!-- First Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label for="Domain" class="form-label">Domain</label>
                                <select class="form-select" id="Domain" name="Domain">
                                    <option>HSE</option>
                                    <option value="Français">Maintenance</option>
                                    <option value="Arabe">Transverse et
                                        Fonctions Support</option>
                                    <option value="Anglais">Exploitation</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <input type="text" class="form-control mt-2" id="Domain_autre" name="Domain_autre" placeholder="Entrez autre langue" style="display: none;">
                            </div>
                        </div>
                        <!-- Second Column -->
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label for="Theme" class="form-label">Thème</label>
                                <select class="form-select" id="Theme" name="Theme">
                                    <option>Risques liés aux installations d’ammoniac</option>
                                    <option value="Français">Défense Contre Incendie (DCI)</option>
                                    <option value="Arabe">Équipements de Protection Individuelle (EPI) :
                                        Choix et utilisations</option>
                                    <option value="Anglais">Le bruit : source de nuisances professionnelles
                                        et de danger</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <input type="text" class="form-control mt-2" id="Theme_autre" name="Theme_autre" placeholder="Entrez autre thème" style="display: none;">
                            </div>
                        </div>
                        <!-- Third Column -->
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label for="Sessions" class="form-label">Sessions</label>
                                <select class="form-select" id="Sessions" name="Sessions">
                                    <option>session 1</option>
                                    <option value="Français">session 2</option>
                                    <option value="Arabe">session 3</option>
                                    <option value="Anglais">session 4</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <input type="text" class="form-control mt-2" id="Sessions_autre" name="Sessions_autre" placeholder="Entrez autre session" style="display: none;">
                            </div>
                        </div>
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
                            <a href="{{ route('candidat.index') }}">
                                <button type="button" class="btn btn-primary me-2 mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block"> Nouveau Candidat</span>
                                </button>
                            </a>
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
                                <tr>
                                    <td>1</td>
                                    <td>Smith</td>
                                    <td>John</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action1" id="actionPresent1" value="present">
                                            <label class="form-check-label" for="actionPresent1">Present</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action1" id="actionAbsent1" value="absent">
                                            <label class="form-check-label" for="actionAbsent1">Absent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action1" id="actionJustification1" value="absent_with_justification">
                                            <label class="form-check-label" for="actionJustification1">Absent with Justification</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="motif1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Doe</td>
                                    <td>Jane</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action2" id="actionPresent2" value="present">
                                            <label class="form-check-label" for="actionPresent2">Present</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action2" id="actionAbsent2" value="absent">
                                            <label class="form-check-label" for="actionAbsent2">Absent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="action2" id="actionJustification2" value="absent_with_justification">
                                            <label class="form-check-label" for="actionJustification2">Absent with Justification</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="motif2">
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
