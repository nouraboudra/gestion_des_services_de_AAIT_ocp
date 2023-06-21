@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion tdes Utilisateurs /</span> Ajouter un nouveau Role
    </h4>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card">
              <h5 class="card-header"></h5>
              <div class="card-body">
                <!-- HTML5 Inputs -->
                <form id="Adduser" action="{{ route('roles.store') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du rôle" autofocus>
                  </div>
                  <div class="card-body">
                      <strong>Permissions</strong>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-borderless border-bottom">
                          <thead>
                              <tr>
                                  <th class="text-nowrap">Type</th>
                                  <th class="text-nowrap text-center">Afficher</th>
                                  <th class="text-nowrap text-center">Ajouter</th>
                                  <th class="text-nowrap text-center">Modifier</th>
                                  <th class="text-nowrap text-center">Supprimer</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="text-nowrap">candidat</td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[candidat][afficher]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[candidat][ajouter]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[candidat][modifier]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[candidat][supprimer]" >
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="text-nowrap">Facture</td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[facture][afficher]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[facture][ajouter]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[facture][modifier]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[facture][supprimer]" >
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="text-nowrap">user</td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[user][afficher]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[user][ajouter]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[user][modifier]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[user][supprimer]" >
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="text-nowrap">Role</td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[role][afficher]" >
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[role][ajouter]">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[role][modifier]">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[role][supprimer]" >
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="text-nowrap">Absance</td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[absence][afficher]">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[absence][ajouter]">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[absence][modifier]">
                                      </div>
                                  </td>
                                  <td>
                                      <div class="form-check d-flex justify-content-center">
                                          <input class="form-check-input" type="checkbox" name="permissions[absence][supprimer]">
                                      </div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="mb-3">
                      <button class="btn btn-primary d-grid w-100 custom-btn" type="submit" style="background-color: #002A5C;">Ajouter</button>
                  </div>
              </form>
                         
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
