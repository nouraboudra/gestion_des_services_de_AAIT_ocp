<div>
    @if ($session)
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Gestion de Présence /</span> Présence Session {{ $sessionCount }}
        </h4>

        <div class="container mt-4">
            <!-- First Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-header"><b>Formation :</b> {{ $session->formation->Intitulé }} </h5>

                                <h5 class="card-header"><b>Groupe :</b> {{ $session->groupe->nom }}
                                    ({{ sizeof($candidats) }})
                                </h5>
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
                                    <button type="button" wire:click="setReplace(false)"
                                        class="btn btn-primary me-2 mb-4" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Nouveau Candidat</span>
                                    </button>

                                    <!-- Download button -->
                                    <button type="button" wire:click="downloadExcel" class="btn btn-success me-2 mb-4">
                                        <i class="bx bx-download d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Télécharger Excel</span>
                                    </button>
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
                                            <th>Etat</th>
                                            <th>Motif</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($candidats as $member)
                                            <tr>
                                                <td>{{ $member->id }}</td>
                                                <td>{{ $member->user->nom }}</td>
                                                <td>{{ $member->user->prenom }}</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="action{{ $member->id }}"
                                                            wire:model="attendanceStatus.{{ $member->id }}"
                                                            value="present">
                                                        <label class="form-check-label"
                                                            for="actionPresent{{ $member->id }}">Present</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="action{{ $member->id }}"
                                                            id="actionAbsent{{ $member->id }}" value="absent"
                                                            wire:model="attendanceStatus.{{ $member->id }}">

                                                        <label class="form-check-label"
                                                            for="actionAbsent{{ $member->id }}">Absent</label>
                                                    </div>

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        {{ $attendanceStatus[$member->id] !== 'absent' ? 'readonly' : '' }}
                                                        name="motif{{ $member->id }}"
                                                        wire:model="{{ $attendanceStatus[$member->id] == 'absent' ? 'justifications.' . $member->id : 'justifications.' }}">

                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item"
                                                                wire:click="deleteCandidat({{ $member->id }})">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#modalCenter"
                                                                wire:click="setReplaceCandidat({{ $member->id }})">
                                                                <i class="bx bx-repost me-1"></i> Replace
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <p align="center"> pas de candidat dans cette session</p>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end mt-4">
                                <button wire:click="saveAttendance" class="btn btn-success">Sauvegarder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div wire:ignore class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Modal Content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un nouveau Candidat au groupe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form -->
                    <div class="modal-body">
                        <!-- Search Field -->
                        <div class="mb-3">
                            <label for="search" class="form-label">Search</label>
                            <input wire:model.debounce.500ms="search" type="text" id="search" class="form-control"
                                placeholder="Search Candidate">
                        </div>

                        <!-- Search Results -->
                        <div id="searchResults" class="list-group" style="max-height: 200px; overflow-y: auto;"></div>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler
                        </button>

                        <button class="btn btn-success" wire:click="addToGroupe">Enregistrer</button>

                    </div>

                </div>

            </div>
        </div>
    @else
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Gestion de Présence /</span>
        </h4>

        <div class="container mt-4">
            <!-- First Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="row">
                                <p align="center">pas de session aujourd'hui</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

</div>
<script>
    let selectedCandidates = [];

    document.addEventListener('livewire:load', function() {

        @this.on(`searchResultsUpdated`, function(data) {
            let searchResultsElement = document.getElementById('searchResults');
            searchResultsElement.innerHTML = '';
            data.forEach(result => {
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

        if (@this.replace) {
            @this.call('replaceCandidat', id);
        } else {
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
            selectedCandidates = [];
            console.log(selectedCandidates);
            window.livewire.emit('selectCandidat', selectedCandidates);
        }

    }
</script>
