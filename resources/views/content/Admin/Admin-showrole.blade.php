@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Utilisateurs')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<style>
    .permission-container {
        display: flex;
        flex-wrap: wrap;
    }

    .permission-container .badge {
        margin-bottom: 0.5rem;
    }

</style>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Gestion des Utilisateurs /</span> Rôles</h4>

<!-- Examples -->
<div class="card">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            <div class="button-wrapper">
                <a href="{{ route('roles.create') }}">
                    <button type="button" class="btn btn-primary me-2 mb-4" id="createRoleBtn">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Nouveau Rôle</span>
                    </button></a>
            </div>
        </div>
    </div>
    <div class="ta text-nowrap">

        <!-- Table body -->
        <table class="table">
            <!-- Table headers -->
            <thead>
                <tr>
                    <th>Rôle</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody class="table-border-bottom-0">
                <!-- Existing role rows -->
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <div class="permission-container">
                            @foreach($role->permissions as $permission)
                            @php
                            $randomClass = ['bg-label-success', 'bg-label-primary', 'bg-label-info', 'bg-label-warning'][array_rand(['bg-label-success', 'bg-label-primary', 'bg-label-info', 'bg-label-warning'])];
                            @endphp
                            <span class="badge {{ $randomClass }} me-1">{{ $permission->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">

                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form id="deleteForm-{{ $role->id }}" action="{{ route('roles.delete', $role->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <a class="dropdown-item delete-link" href="javascript:void(0);">
                                      <i class="bx bx-trash me-1"></i> Delete
                                  </a>
                              </form>
                            </div>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
                <!-- Remaining role rows -->
            </tbody>
        </table>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Get all delete link elements
      const deleteLinks = document.querySelectorAll('.delete-link');
      
      // Add click event listener to each delete link
      deleteLinks.forEach(function(deleteLink) {
          deleteLink.addEventListener('click', function(e) {
              e.preventDefault(); // Prevent default link behavior
              
              // Get the associated form ID
              const formId = deleteLink.closest('form').id;
              
              // Trigger form submission
              document.getElementById(formId).submit();
          });
      });
  });
</script>

@endsection
