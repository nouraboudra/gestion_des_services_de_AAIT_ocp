@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-...your-integrity-hash...==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-...your-integrity-hash...==" crossorigin="anonymous"></script>

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion des candidats /</span> Candidats EcoSysteme
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('candidatOcp.index') }}"><i
                            class="bx bx-user me-1"></i> Candidats OCP</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        Candidats Ecosystème</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="card card-lg">
                <h5 class="card-header">Insertion des candidats</h5>
                <!-- insertion des candidats -->

                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                            <form action="{{ route('candidatEcosysteme.upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="file-upload" class="btn btn-primary me-2 mb-4">
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Choisir un fichier Excel</span>
                                </label>
                                <input id="file-upload" type="file" name="file" accept=".xlsx, .xls, .csv" required
                                    style="display: none;">
                                <button type="submit" class="btn btn-primary me-2 mb-4">
                                    <i class="fas fa-cloud-upload-alt"></i>

                                </button>
                            </form>
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
                <div class="d-flex justify-content-end align-items-center">
                    <div class="form-group mb-0">
                        <label for="page-size" class="form-label me-2">Taille de la page:</label>
                        <select id="page-size" class="form-select form-select-sm">
                            <option value="5" {{ $page_size == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ $page_size == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $page_size == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ $page_size == 30 ? 'selected' : '' }}>30</option>
                            <option value="50" {{ $page_size == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table  ">
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
                                    <td><strong>{{ $candidat->candidat->user->Matricule }}</strong></td>
                                    <td>{{ $candidat->candidat->user->nom }}</td>
                                    <td>{{ $candidat->candidat->user->prenom }}</td>
                                    <td>{{ $candidat->candidat->user->email }}</td>
                                    <td>{{ $candidat->Entreprise_actuelle }}</td>
                                    <td>{{ $candidat->Poste_actuellement_occupe }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"><i
                                                    class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $candidats->links('pagination.custom-pagination-links-view') }}

                <!-- /insrtion candidat -->
            </div>
        </div>
    </div>
@endsection
@section('additional-scripts')
    <script>
        $(document).ready(function() {
            // Handle page size change
            $('#page-size').on('change', function() {
                var page_size = $(this).val();
                var url = "{{ route('candidatEcosysteme.index') }}" + "?page_size=" + page_size;
                window.location.href = url;
            });
        });
    </script>
@endsection
