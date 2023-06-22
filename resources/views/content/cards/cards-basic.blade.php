@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Utilisateurs')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script>
  function openUserAddForm() {
    window.location.href = "{{ route('forms-useradd') }}";
  }

  function openRoleForm() {
    window.location.href = "{{ route('forms-roleadd') }}";
  }
</script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gestion des Utilisateurs /</span> Utilisateurs</h4>

<!-- Examples -->
<div class="card">
  <h5 class="card-header"></h5>
  <div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
      <div class="button-wrapper">
        <button type="button" class="btn btn-primary me-2 mb-4" onclick="openUserAddForm()">
          <i class="bx bx-reset d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Ajouter nouveau Utilisateur</span>
        </button>
        
        <button type="button" class="btn btn-primary me-2 mb-4" onclick="openRoleForm()">
          <i class="bx bx-reset d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Ajouter nouveau Role</span>
        </button>
        
        
      </div>
    </div>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table  ">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td> BOUDRA</td>
          <td> Noura</td>
          <td> Noura.boudra1@gmail.com</td>
          <td><span class="badge bg-label-success me-1">ADMIN</span>
              <span class="badge bg-label-primary me-1">User</span>
              <span class="badge bg-label-info me-1">User</span>
              <span class="badge bg-label-warning me-1">Pending</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> Jabar</td>
          <td> jamila</td>
          <td> jamila.test1@gmail.com</td>
          <td><span class="badge bg-label-warning me-1">Planificateur</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> test</td>
          <td> test</td>
          <td> jtest.tt1@gmail.com</td>
          <td><span class="badge bg-label-warning me-1">Agent-facturation</span>
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- end -->
@endsection
