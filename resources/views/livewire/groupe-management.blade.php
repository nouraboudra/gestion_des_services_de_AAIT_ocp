<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion école /</span> Groupes
    </h4>

    <div class="card">
        <h5 class="card-header">Groupes</h5>
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
                            <th>Nom</th>
                            <th>Capacité Maximal</th>
                            <th>Capacité Actuel</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groupes as $groupe)
                            <tr>
                                <td><a
                                        href=" {{ $groupe->type == 'ocp' ? route('school.groupes.candidats.ocp.index', $groupe->id) : route('school.groupes.candidats.ecosystem.index', $groupe->id) }}">{{ $groupe->nom }}</a>
                                </td>
                                <td>{{ $groupe->capacite }}</td>
                                <td>{{ sizeof($groupe->candidats) }}</td>
                                <td>{{ $groupe->type }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"
                                                wire:click="deleteGroupe({{ $groupe->id }})">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $groupes->links('pagination.custom-pagination-links-view') }}

            <div>
                <form wire:submit.prevent="saveGroupe" wire:ignore>

                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal Content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau
                                        groupe
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <!-- Form -->
                                <div class="modal-body">
                                    <!-- Nom -->
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input required wire:model="nom" type="text" id="nom"
                                            class="form-control" name="nom" placeholder="Entrez le nom">
                                    </div>



                                    <div class="mb-3">
                                        <label for="capacity" class="form-label">Capacité</label>
                                        <input type="number" min="3" max="100" required
                                            wire:model="capacite" class="form-control" id="capacite" name="capacite"
                                            placeholder="Entrez la capacité">
                                    </div>
                                    <!-- User Type Selection -->
                                    <div class="mb-3">
                                        <label for="userType" class="form-label">Type d'utilisateur</label>
                                        <select wire:model="userType" id="userType" class="form-select">
                                            <option value="" disabled selected>Selectionner un groupe</option>
                                            <option value="ocp">OCP Groupe</option>
                                            <option value="ecosysteme">Ecosysteme Groupe</option>
                                        </select>
                                    </div>
                                    <!-- Search Field -->
                                    <div class="mb-3">
                                        <label for="search" class="form-label">Search</label>
                                        <input wire:model.debounce.500ms="searchMembers" type="text" id="search"
                                            class="form-control" placeholder="Search Candidate">
                                    </div>

                                    <!-- Search Results -->
                                    <div id="searchResults" class="list-group"
                                        style="max-height: 200px; overflow-y: auto;"></div>


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
</div>
<script>
    let selectedCandidates = [];

    document.addEventListener('livewire:load', function() {
        @this.on(`searchResultsUpdated`, function(data) {

            let searchResultsElement = document.getElementById('searchResults');
            searchResultsElement.innerHTML = '';
            data.forEach(result => {
                console.log(result);

                let itemHTML = `
            <a href="#" id="candidate-${result.id}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="selectCandidate(${result.id})">
                <div>
                    <p class="mb-0">${result.user.nom} ${result.user.prenom}</p>
                </div>
                <div>
                    <i id="checkmark-${result.id}" class="${selectedCandidates.includes(result.id) ? '' : 'd-none'} bx bx-check"></i>
                </div>
            </a>
        `;
                searchResultsElement.innerHTML += itemHTML;

            });
        });

        function hideModal() {
            $("#modalCenter [data-bs-dismiss=modal]").trigger({
                type: "click"
            });
        }

        @this.on(`hideModal`, () => {
            hideModal();
        });

    });

    function selectCandidate(id) {


        let candidateElement = document.getElementById(`candidate-${id}`);
        let checkmarkElement = document.getElementById(`checkmark-${id}`);

        if (selectedCandidates.includes(id)) {
            let index = selectedCandidates.indexOf(id);
            if (index > -1) {
                selectedCandidates.splice(index, 1);
            }
            checkmarkElement.classList.add('d-none');
        } else {
            selectedCandidates.push(id);
            checkmarkElement.classList.remove('d-none');
        }
        // Update Livewire component property
        @this.set('selectedCandidates', selectedCandidates);
        window.livewire.emit('selectCandidat', selectedCandidates);


    }
</script>
