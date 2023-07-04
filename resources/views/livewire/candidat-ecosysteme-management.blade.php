    <div>


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Gestion du centre / <a style="color: inherit;"
                    href="{{ route('school.groupes.index') }}">Groupes</a></span>
            / {{ $groupe->nom }}
        </h4>

        <div class="card">
            <h5 class="card-header">Candidats</h5>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center justify-content-between mb-3">
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="Search..." wire:model="search" />
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
            </div>
            {{ $candidats->links('pagination.custom-pagination-links-view') }}

        </div>
    </div>

    </div>
