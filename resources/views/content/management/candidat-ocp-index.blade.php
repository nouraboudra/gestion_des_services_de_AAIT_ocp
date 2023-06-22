@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Gestion des candidats /</span> Candidats OCP
</h4> 

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Candidats OCP</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route("candidatEcosysteme.index") }}"><i class="bx bx-user me-1"></i> Candidats Ecosystème</a></li>
    </ul>
    <div class="card mb-4">
      
      <div class="table-responsive text-nowrap">
        <table class="table  ">
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
            @foreach($candidats as $candidat)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $candidat->Matricule }}</strong></td>
              
                <td>{{ $candidat->candidat->user->nom }}</td>
                <td>{{ $candidat->candidat->user->prenom }}</td>
                <td>{{ $candidat->candidat->user->email }}</td>
             
              <td>{{ $candidat->GROUPE_Professionnel }}</td>
              <td>{{ $candidat->service }}</td>
              <td>{{ $candidat->Direction }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
</div>
@endsection
