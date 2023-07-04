@extends('layouts/contentNavbarLayout')

@section('title', 'Planification')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion du centre /</span> Domaines
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
                <h5 class="card-header">Les domaines</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable " class="table     table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($domains as $domain)
                                    <tr>
                                        <td>{{ $domain->nom }}</td>
                                        <td>
                                            <form action="{{ route('school.domaines.destroy', $domain->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item delete-link"><i
                                                        class="bx bx-trash me-1"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" align="center">Pas de domaines</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau domaine</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('school.domaines.store') }}">
                            @csrf
                            <div class="modal-body">
                                <!-- Nom -->
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" id="nom" class="form-control" name="nom"
                                        placeholder="Entrez le nom du domaine">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
