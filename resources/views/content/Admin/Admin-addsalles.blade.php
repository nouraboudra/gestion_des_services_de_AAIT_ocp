@extends('layouts/contentNavbarLayout')

@section('title', 'Salles - management')

@section('page-script')
    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script>
        // Function to show/hide additional fields based on selection
        function showHideFields() {
            var batimentValue = document.getElementById('Batiment').value;
            var typeSalleValue = document.getElementById('smallSelect').value;
            var otherBatimentField = document.getElementById('otherBatimentField');
            var otherTypeSalleField = document.getElementById('otherTypeSalleField');

            if (batimentValue === 'Autre') {
                otherBatimentField.style.display = 'block';
            } else {
                otherBatimentField.style.display = 'none';
            }

            if (typeSalleValue === 'Autre') {
                otherTypeSalleField.style.display = 'block';
            } else {
                otherTypeSalleField.style.display = 'none';
            }
        }

        // Call the function initially to set the correct display state
        showHideFields();
    </script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Gestion des salles /</span> Ajouter une salle
    </h4>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card">
                    <h5 class="card-header"></h5>
                    <div class="card-body">
                        <!-- HTML5 Inputs -->
                        <form id="Adduser" action="{{ route('salles.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="number" min="1" class="form-control" id="code" name="code"
                                        required placeholder="Code" autofocus>
                                </div>
                                <div class="col-md-8">
                                    <label for="intitule" class="form-label">Intitule</label>
                                    <input type="text" class="form-control" id="intitule" name="intitule" required
                                        placeholder="Intitule" autofocus>
                                </div>
                            </div>
                            <!-- ... Your other code ... -->

                            <div class="mt-2 mb-3">
                                <label for="Batiment" class="form-label">Bâtiment</label>
                                <select id="Batiment" class="form-select" name="batiment" onchange="showHideFields()"
                                    required>
                                    @foreach ($batiments as $id => $nom)
                                        <option value="{{ $id }}">{{ $nom }}</option>
                                    @endforeach
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div id="otherBatimentField" style="display: none;">
                                <div class="mt-2 mb-3">
                                    <label for="autreBatiment" class="form-label">Autre Bâtiment</label>
                                    <input type="text" class="form-control" id="autreBatiment" name="autre_batiment"
                                        placeholder="Autre Bâtiment">
                                </div>
                            </div>
                            <div class="mt-2 mb-3">
                                <label for="smallSelect" class="form-label">Type_salle</label>
                                <select id="smallSelect" class="form-select" name="typesalle" onchange="showHideFields()"
                                    required>
                                    @foreach ($typesalles as $id => $nom)
                                        <option value="{{ $id }}">{{ $nom }}</option>
                                    @endforeach
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div id="otherTypeSalleField" style="display: none;">
                                <div class="mt-2 mb-3">
                                    <label for="autreTypeSalle" class="form-label">Autre Type_salle</label>
                                    <input type="text" class="form-control" id="autreTypeSalle" name="autre_type_salle"
                                        placeholder="Autre Type_salle">
                                </div>
                            </div>

                            <!-- ... Your other code ... -->

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100 custom-btn" type="submit"
                                    style="background-color: #002A5C;">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
