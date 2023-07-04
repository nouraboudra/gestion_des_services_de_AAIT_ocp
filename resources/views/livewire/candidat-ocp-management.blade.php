<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion du centre/ <a style="color: inherit;"
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
                    <select id="page-size" class="form-select form-select-sm" wire:model="page_size">
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
                                @if ($candidat->candidat)
                                    <td>{{ $candidat->candidat->user->nom }}</td>
                                    <td>{{ $candidat->candidat->user->prenom }}</td>
                                    <td>{{ $candidat->candidat->user->email }}</td>
                                @endif


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

</div>
