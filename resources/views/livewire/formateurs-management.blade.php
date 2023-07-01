<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion école/</span> Formateurs
    </h4>

    <div class="card">
        <h5 class="card-header">Formateurs</h5>
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center justify-content-between mb-3">
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control" placeholder="Search..." wire:model="search" />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        <i class="bx bx-plus"></i> Ajouter
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <div class="form-group">
                    <label for="page-size" class="form-label">Taille de la page:</label>
                    <select id="page-size" class="form-select form-select-sm" wire:model="pageSize">
                        <option value="10">5</option>
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
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($formateurs as $formateur)
                            <tr>
                                <td>{{ $formateur->user->nom }}</td>
                                <td>{{ $formateur->user->prenom }}</td>
                                <td>{{ $formateur->user->email }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i>
                                                Modifier</a>
                                            <button class="dropdown-item delete-link"
                                                wire:click="deleteFormateur({{ $formateur->id }})"><i
                                                    class="bx bx-trash me-1"></i>
                                                Supprimer</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"> Pas de Formateurs </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $formateurs->withQueryString()->links('pagination.custom-pagination-links-view') }}
        </div>

        <div>
            <form wire:submit.prevent="saveFormateur" wire:ignore>

                <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <!-- Modal Content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau
                                    formateur
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Form -->
                            <div class="modal-body">
                                <!-- Nom -->
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input wire:model="nom" type="text" id="nom" class="form-control"
                                        name="nom" placeholder="Entrez le nom">

                                </div>

                                <!-- Prénom -->
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input wire:model="prenom" type="text" id="prenom" class="form-control"
                                        name="prenom" placeholder="Entrez le prénom">

                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input wire:model="email" type="email" id="email" class="form-control"
                                        name="email" placeholder="Entrez l'email">

                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" wire:model="password" name="password" class="form-control">

                                </div>

                                <div class="mb-3">
                                    <label for="matricule" class="form-label">Matricule/CIN</label>
                                    <input type="text" wire:model="matricule" class="form-control" id="matricule"
                                        name="matricule" placeholder="Entrez Matricule ou CIN">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {

        function hideModal() {
            $("#modalCenter [data-bs-dismiss=modal]").trigger({
                type: "click"
            });
        }

        @this.on(`hideModal`, () => {
            console.log("event");
            hideModal();
        });
    });
</script>
