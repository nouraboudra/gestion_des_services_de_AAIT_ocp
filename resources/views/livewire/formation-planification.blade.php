<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Planification /</span> Formations
    </h4>
    <div class="card">
        <h5 class="card-header">Formations</h5>
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
                            <th>Intitulé</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($formations as $formation)
                            <tr>
                                <td><a
                                        href="{{ route('planing.sessions.index', $formation->id) }}">{{ $formation->Intitulé }}</a>
                                </td>
                                <td>{{ date('d-m-Y', strtotime($formation->date_debut)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($formation->date_fin)) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>
                                                Modifier</a>
                                            <button class="dropdown-item delete-link"
                                                wire:click="deleteFormation({{ $formation->id }})"><i
                                                    class="bx bx-trash me-1"></i>
                                                Supprimer</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"> Pas de Formations </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $formations->withQueryString()->links('pagination.custom-pagination-links-view') }}

        </div>

        <div class="separator"></div>
        <div>
            <div class="container calendar-section" id='calendar-container' wire:ignore>
                <h2>Calendrier</h2>
                <div id='calendar'></div>
            </div>
        </div>


        <div x-data="{ showModal: false, start: '', end: '' }" wire:ignore>
            <form wire:submit.prevent="saveFormation">

                <div wire:ignore.self class="modal fade" id="modalCenter" tabindex="-1"
                    aria-labelledby="modalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <!-- Modal Content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une nouvelle
                                    formation
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Form -->
                            <div class="modal-body">
                                <!-- Intitulé -->
                                <div class="mb-3">
                                    <label for="Intitulé" class="form-label">Intitulé</label>
                                    <input wire:model="title" type="text" id="title" class="form-control"
                                        name="title" placeholder="Entrez Intitulé">
                                    @error('title')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Date début -->
                                <div class="mb-3">
                                    <label for="date_debut" class="form-label">Date Début</label>
                                    <input wire:model="start" type="date" id="start" class="form-control"
                                        name="start">
                                    @error('start')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Date fin -->
                                <div class="mb-3">
                                    <label for="date_fin" class="form-label">Date Fin</label>
                                    <input wire:model="end" type="date" id="end" class="form-control"
                                        name="end">
                                    @error('end')
                                        <span class="error">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="theme_id" class="form-label">Themes</label>
                                    @foreach ($themes as $theme)
                                        <div class="form-check">
                                            <input wire:model="theme_ids" class="form-check-input" type="checkbox"
                                                value="{{ $theme->id }}" id="theme-{{ $theme->id }}"
                                                name="themes[]">
                                            <label class="form-check-label" for="theme-{{ $theme->id }}">
                                                {{ $theme->nom }}
                                            </label>
                                        </div>
                                    @endforeach
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


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
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
            weekNumbers: true,
            events: JSON.parse(@this.events),
            editable: true,
            selectable: true,
            selectMirror: true,
            unselectCancel: true,
            unselectAuto: true,
            droppable: true, // this allows things to be dropped onto the calendar
            select: function(info) {
                var startDateString = info.startStr; // The start date of the selected range
                var startDate = startDateString.split('T')[0];
                var endDate = info.endStr; // The end date of the selected range
                var endDate = endDate.split('T')[0]; // The end date of the selected range
                if (endDate < startDate) {
                    endDate = info.startStr;
                    startDate = info.endStr;
                }
                if (startDate != endDate) {
                    var parts = endDate.split('-'); // Split the date string into parts
                    var year = parseInt(parts[0]);
                    var month = parseInt(parts[1]) -
                        1; // Subtract 1 from the month (JavaScript uses 0-based indexing)
                    var day = parseInt(parts[2]);
                    var dateObj = new Date(year, month, day); // Create a new Date object

                    var newEndDate = dateObj.toISOString().split('T')[
                        0]; // Convert back to string (ISO format) and extract the date part

                    endDate = newEndDate; // The end date of the selected range


                }

                @this.start = startDate;
                @this.end = endDate;
                calendar.unselect();
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
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js"></script>
<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js"></script>
<script src="https://fullcalendar.io/js/fullcalendar-3.1.0/locale/fr.js"></script>
