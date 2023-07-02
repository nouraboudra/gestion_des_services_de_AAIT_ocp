@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Utilisateurs')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gestion des Utilisateurs /</span> Utilisateurs</h4>

    <div class="card">
        <h5 class="card-header">Utilisateurs</h5>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center justify-content-between mb-3">
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control" value="{{ $search }}" id="searchInput"
                        placeholder="Chercher..." />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        <i class="bx bx-plus"></i> Ajouter
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <div class="form-group">
                    <label for="page-size" class="form-label">Taille de la page:</label>
                    <select id="page-size" class="form-select form-select-sm" wire:model="pageSize">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->Matricule }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        @php
                                            $randomClass = ['bg-label-success', 'bg-label-primary', 'bg-label-info', 'bg-label-warning'][array_rand(['bg-label-success', 'bg-label-primary', 'bg-label-info', 'bg-label-warning'])];
                                        @endphp
                                        <span class="badge {{ $randomClass }} me-1">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item  delete-link" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form id="deleteForm-{{ $user->Matricule }}"
                                                action="{{ route('users.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item delete-link" href="javascript:void(0);">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(['search' => $search, 'page_size' => $pageSize])->withQueryString()->links('pagination.custom-pagination-links-view') }}

            </div>

        </div>
        <!-- end -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all delete link elements
                const deleteLinks = document.querySelectorAll('.delete-link');

                // Add click event listener to each delete link
                deleteLinks.forEach(function(deleteLink) {
                    deleteLink.addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent default link behavior

                        // Get the associated form ID
                        const formId = deleteLink.closest('form').id;

                        // Trigger form submission
                        document.getElementById(formId).submit();
                    });
                });
            });
        </script>
    @endsection
