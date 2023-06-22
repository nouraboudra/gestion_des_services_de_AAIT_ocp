
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Planification /</span>  Sessions
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a href="{{ route('planing.formations.index') }}" class="nav-link " ><i class="bx bx-user me-1"></i> Formations</a></li>
        </ul>
        <div class="card card-lg">
            <h5 class="card-header">Planing du {{ $formation->Intitulé }}</h5>
            <button type="button" style="width: 120px; align:right;"class="float-right btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modalCenter">
                ajouter
              </button>
            <div class="card-body">
                <div class="tab-content">                    
                        
                    <!-- Table body -->
                    <div>
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Groupe</th>
                                    <th>Salle</th>
                                    <th>Formation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($sessions as $session)
                                <tr>
                                    <td>{{ $session->id }}</td>
                                    <td>{{ date("d-m-Y", strtotime($session->date_debut)) }}</td>
                                    <td>{{ $session->groupe->nom }}</td>
                                    <td>{{ $session->salle->code }}</td>
                                    <td>{{ $session->formation->Intitulé }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                                                <form action="{{ route("planing.sessions.destroy", $session->id) }}" method="POST">
                                                    @csrfè
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr><td colspan="7"> Pas de sessions </td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

            
                    
                    <div x-data>
                        <div id='calendar-container' wire:ignore>
                          <div id='calendar'></div>
                        </div>
                      </div>

                      <div class="modal fade" id="modalCenter" tabindex="-1" aria-labelledby="modalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                           <!-- Modal Content -->
                           <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une nouvelle session</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          
                            <!-- Form -->
                            <form method="POST" action="{{ route('planing.sessions.store') }}">
                              @csrf
                              <div class="modal-body">
                                <!-- Date début -->
                                <div class="mb-3">
                                  <label for="date_debut" class="form-label">Date</label>
                                  <input type="date" id="date_debut" class="form-control" name="date_debut">
                                </div>
                          
                          
                                <!-- Formation ID -->
                                <input type="text" hidden id="formation_id" value="{{ $formationId }}" class="form-control" name="formation_id">


                                <!-- Groupe ID -->
                                <div class="mb-3">
                                    <label for="groupe_id" class="form-label">Groupe</label>
                                    <select class="form-select" id="groupe_id" name="groupe_id">
                                        @foreach($groupes as $groupe)
                                            <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Salle ID -->
                                <div class="mb-3">
                                    <label for="salle_id" class="form-label">Salle</label>
                                    <select class="form-select" id="salle_id" name="salle_id">
                                        @foreach($salles as $salle)
                                            <option value="{{ $salle->id }}">{{ $salle->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                          
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                              </div>
                            </form>
                          </div>
  
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
           
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
<script>


    document.addEventListener('livewire:load', function() {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
        var calendarEl = document.getElementById('calendar');
        var checkbox = document.getElementById('drop-remove');
        console.log("data");
        console.log(window.Alpine === undefined);
        var data = {!! $events !!};
        console.log(data);
        console.log("data");
        var calendar = new Calendar(calendarEl, {
        events: JSON.parse(data),
        dateClick(info)  {
           var title = prompt('Enter Event Title');
           var date = new Date(info.dateStr + 'T00:00:00');
           if(title != null && title != ''){
             calendar.addEvent({
                title: title,
                start: date,
                allDay: true
              });
             var eventAdd = {title: title,start: date};

             alert('Great. Now, update your database...');
           }else{
            alert('Event Title Is Required');
           }
        },
        editable: true,
        selectable: true,
        displayEventTime: false,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },      
        });
        calendar.render();

    });
</script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />

