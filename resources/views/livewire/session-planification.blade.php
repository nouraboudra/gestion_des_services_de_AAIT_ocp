<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Planification / <a style="color: inherit;"
                href="{{ route('planing.formations.index') }}">Formations /
            </a>
        </span> Sessions
    </h4>
    <div class="card">
        <h5 class="card-header">Sessions</h5>
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
                            <th>Intitulé</th>
                            <th>Date</th>
                            <th>Groupe</th>
                            <th>Salle</th>
                            <th>Formateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($sessions as $session)
                            <tr>
                                <td>{{ $session->id }}</td>
                                <td>{{ $session->intitule }}</td>

                                <td>{{ date('d-m-Y', strtotime($session->date_debut)) }}</td>
                                <td>
                                    <div class="user-info"
                                        data-tippy-content=" ID : {{ $session->groupe->id }}<br/> capacity : {{ $session->groupe->capacite }}">
                                        {{ $session->groupe->nom }}
                                    </div>
                                </td>
                                <td>
                                    <div class="user-info"
                                        data-tippy-content=" ID : {{ $session->salle->id }}<br/>Batiment : {{ $session->salle->batiment->nom }} <br/>Type:{{ $session->salle->typessalle }}">
                                        {{ $session->salle->code }}
                                    </div>
                                </td>

                                <td>
                                    <div class="user-info"
                                        data-tippy-content=" ID : {{ $session->formateur->user->id }}<br/>email : {{ $session->formateur->user->email }}">
                                        {{ $session->formateur->user->nom . ' ' . $session->formateur->user->prenom }}
                                    </div>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click="editSession({{ $session->id }})"
                                                href="#" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                                <i class="bx bx-edit-alt me-1"></i> Modifier
                                            </a> <button class="dropdown-item delete-link"
                                                wire:click="deleteSession({{ $session->id }})"><i
                                                    class="bx bx-trash me-1"></i>
                                                Supprimer</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"> Pas de sessions </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $sessions->withQueryString()->links('pagination.custom-pagination-links-view') }}

        </div>

        <div class="separator"></div>

        <div x-data>
            <div class="container calendar-section" id='calendar-container' wire:ignore>
                <h2>Calendrier</h2>
                <div id='calendar'></div>
            </div>
        </div>

        <form wire:submit.prevent="saveSession" wire:ignore>

            <div wire:ignore class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <!-- Modal Content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une nouvelle
                                session
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <!-- Form -->

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="intitule" class="form-label">Intitulé</label>
                                <input type="intitule" required id="intitule" wire:model="intitule"
                                    class="form-control" name="intitule">
                            </div>

                            <!-- Date début -->
                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date</label>
                                <input type="date" id="date_debut" min="{{ $formation->date_debut }}"
                                    max="{{ $formation->date_fin }}" wire:model="start" required class="form-control"
                                    name="date_debut">
                            </div>


                            <!-- Formation ID -->
                            <input type="text" hidden required id="formation_id" wire:model="formation_id"
                                class="form-control" name="formation_id">


                            <!-- Groupe ID -->
                            <div class="mb-3">
                                <label for="groupe_id" class="form-label">Groupe</label>
                                <select class="form-select" wire:model="groupe_id" required id="groupe_id"
                                    name="groupe_id">
                                    @once
                                        <option value="" disabled selected>Selectionner une date</option>
                                    @endonce

                                </select>
                            </div>

                            <!-- Salle ID -->
                            <div class="mb-3">
                                <label for="salle_id" class="form-label">Salle</label>
                                <select class="form-select" required wire:model="salle_id" id="salle_id"
                                    name="salle_id">
                                    @once
                                        <option value="" disabled selected>Selectionner une date</option>
                                    @endonce

                                </select>
                            </div>
                            <!-- Formateur ID -->
                            <div class="mb-3">
                                <label for="salle_id" class="form-label">Formateur</label>
                                <select class="form-select" required wire:model="formateur_id" id="formateur_id"
                                    name="formateur_id">
                                    @once
                                        <option value="" disabled selected>Selectionner une date</option>
                                    @endonce

                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Fermer</button>
                            @if ($modification)
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            @else
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            @endif
                        </div>
        </form>
    </div>
</div>
</div>
</div>


<script src="
        https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js
        "></script>
<script>
    document.addEventListener('livewire:load', function() {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
        var calendarEl = document.getElementById('calendar');
        var checkbox = document.getElementById('drop-remove');
        new Draggable(calendarEl, {
            itemSelector: '.fc-event'
        });
        var calendar = new Calendar(calendarEl, {
            locale: 'fr',
            headerToolbar: {
                end: 'prev,next today',
                center: 'title',
                start: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            validRange: {
                start: '{!! $formation->date_debut !!}',
                end: '{!! $formation->date_fin !!}'
            },
            weekNumbers: true,
            events: JSON.parse(@this.events),
            editable: true,
            selectable: true,
            selectMirror: true,
            unselectCancel: true,
            unselectAuto: true,
            droppable: true, // this allows things to be dropped onto the calendar

            dateClick: function(info) {
                var startDateString = info.dateStr;
                @this.start = startDateString;
                showModal();

            },
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
            loading: function(isLoading) {
                if (!isLoading) {
                    // Reset custom events
                    this.getEvents().forEach(function(e) {
                        if (e.source === null) {
                            e.remove();
                        }
                    });
                }
            }
        });
        calendar.render();
        // Show the modal function
        function showModal() {
            var modal = new bootstrap.Modal(document.getElementById('modalCenter'));
            modal.show();
        }

        function hideModal() {
            $("#modalCenter [data-bs-dismiss=modal]").trigger({
                type: "click"
            });
        }

        @this.on(`hideModal`, () => {
            hideModal();
        });
        @this.on(`refreshCalendar`, () => {
            calendar.removeAllEvents();
            let updatedEvents = JSON.parse(@this
                .events); // Replace this with the actual function to fetch updated events
            calendar.addEventSource(updatedEvents);
        });

        @this.on(`dateUpdated`, function(data) {
            var salleSelect = $('#salle_id');
            var groupeSelect = $('#groupe_id');
            var formateurSelect = $('#formateur_id');

            // Clear the current options
            salleSelect.empty();
            groupeSelect.empty();
            formateurSelect.empty();
            salleSelect.append('<option  value="" disabled selected>Selectionner une Salle</option>');

            groupeSelect.append('<option  value="" disabled selected>Selectionner un Groupe</option>');
            formateurSelect.append(
                '<option  value="" disabled selected>Selectionner un Formateur</option>');



            // Add the new options to the 'salle_id' select
            $.each(data.salles, function(index, salle) {
                salleSelect.append(new Option(salle.intitule, salle.id));
            });
            $.each(data.groupes, function(index, groupe) {
                var option = new Option(groupe.nom, groupe.id);
                if (groupe.id === @this.groupe_id) {
                    option.selected = true;
                }
                groupeSelect.append(option);
            });

            $.each(data.formateurs, function(index, formateur) {
                console.log(formateur);
                formateurSelect.append(new Option((formateur.user.nom + " " + formateur.user
                    .prenom), formateur.id));
            });
        });

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        tippy('.user-info', {
            placement: 'top', // Adjust the placement as per your needs
            allowHTML: true // Enable HTML content in the tooltip
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script>
<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js"></script>
<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js"></script>
<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/locale/fr.js"></script>
