@extends('layouts/contentNavbarLayout')

@section('title', 'Planification')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion du centre /</span> Thémes
    </h4>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success ml-3" data-bs-toggle="modal" data-bs-target="#modalCenter">
                <i class="bx bx-plus"></i> Ajouter
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card card-lg">
                <h5 class="card-header">Les Thémes</h5>
                <div class="card-body">
                    <div class="tab-content">

                        <!-- Table body -->
                        <div>
                            <table class="table  ">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Domaine</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse($themes as $theme)
                                        <tr>
                                            <td>{{ $theme->nom }}</td>
                                            <td>{{ $theme->domain->nom }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown"><i
                                                            class="bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>
                                                            Modifier</a>
                                                        <form action="{{ route('school.themes.destroy', $theme->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item delete-link"><i
                                                                    class="bx bx-trash me-1"></i> Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" align="center"> Pas de Thèmes </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>




                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal Content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau thème</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Form -->
                                <form method="POST" action="{{ route('school.themes.store') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- Nom -->
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" id="nom" class="form-control" name="nom"
                                                placeholder="Entrez Nom">
                                        </div>

                                        <!-- Domaine ID -->
                                        <div class="mb-3">
                                            <label for="domain_id" class="form-label">Domaine</label>
                                            <select class="form-select" id="domain_id" name="domain_id">
                                                @foreach ($domaines as $domaine)
                                                    <option value="{{ $domaine->id }}">{{ $domaine->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
