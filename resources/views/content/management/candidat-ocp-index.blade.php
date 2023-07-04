@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion des candidats /</span> Candidats OCP
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        Candidats OCP</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('candidatEcosysteme.index') }}"><i
                            class="bx bx-user me-1"></i> Candidats Ecosystème</a></li>
            </ul>
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
        </div>
        <div class="row">

            <div class="card mb-4">

                <div class="table-responsive text-nowrap">
                    <table class="table  ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Groupe professionnel</th>
                                <th>Service</th>
                                <th>Direction</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($candidats as $candidat)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $candidat->Matricule }}</strong>
                                    </td>

                                    <td>{{ $candidat->candidat->user->nom }}</td>
                                    <td>{{ $candidat->candidat->user->prenom }}</td>
                                    <td>{{ $candidat->candidat->user->email }}</td>

                                    <td>{{ $candidat->GROUPE_Professionnel }}</td>
                                    <td>{{ $candidat->service }}</td>
                                    <td>{{ $candidat->Direction }}</td>
                                </tr>
                            @empty
                                <tr>pas de Candidats</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $candidats->links('pagination.custom-pagination-links-view') }}

        </div>
    </div>


@endsection
@section('additional-scripts')
    <script>
        $(document).ready(function() {
            // Handle page size change
            $('#page-size').on('change', function() {
                var page_size = $(this).val();
                var url = "{{ route('candidatOcp.index') }}" + "?page_size=" + page_size;
                window.location.href = url;
            });
        });
    </script>
@endsection
