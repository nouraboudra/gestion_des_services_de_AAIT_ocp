<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Planification /</span>  Formations
</h4>

<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><button class="nav-link active"  wire:click="showFormations()"><i class="bx bx-user me-1"></i> Formations</button></li>
        </ul>
        <div class="card card-lg">
            <h5 class="card-header">Les Formations </h5>
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
                                    <th>Intitulé</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($formations as $formation)
                                <tr>
                                    <td><a href="{{ route("planing.sessions.index",$formation->id ) }}">{{ $formation->Intitulé }}</a></td>
                                    <td>{{  date("d-m-Y", strtotime($formation->date_debut)) }}</td>
                                    <td>{{ date("d-m-Y", strtotime($formation->date_fin))}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <button class="dropdown-item delete-link"><i class="bx bx-trash me-1"></i> Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr><td colspan="4"> Pas de Formations </td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
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
      <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une nouvelle formation</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
  
    <!-- Form -->
    <form method="POST" action="{{ route('planing.formations.store') }}">
      @csrf
      <div class="modal-body">
        <!-- Intitulé -->
        <div class="mb-3">
          <label for="Intitulé" class="form-label">Intitulé</label>
          <input type="text" id="Intitulé" class="form-control" name="Intitulé" placeholder="Entrez Intitulé">
        </div>
  
        <!-- Date début -->
        <div class="mb-3">
          <label for="date_debut" class="form-label">Date Début</label>
          <input type="date" id="date_debut" class="form-control" name="date_debut">
        </div>
  
        <!-- Date fin -->
        <div class="mb-3">
          <label for="date_fin" class="form-label">Date Fin</label>
          <input type="date" id="date_fin" class="form-control" name="date_fin">
        </div>
  
        <!-- Theme ID -->
        <div class="mb-3">
            <label for="theme_id" class="form-label">Themes</label>
            @foreach($themes as $theme)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $theme->id }}" id="theme-{{ $theme->id }}" name="themes[]">
                  <label class="form-check-label" for="theme-{{ $theme->id }}">
                    {{ $theme->nom }}
                  </label>
                </div>
            @endforeach
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

