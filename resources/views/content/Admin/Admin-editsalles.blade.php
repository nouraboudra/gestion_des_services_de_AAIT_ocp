@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier une salle')

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Gestion des salles /</span> Modifier une salle
</h4>

<div class="card">
    <h5 class="card-header">Modifier une salle</h5>
    <div class="card-body">
        <form action="{{ route('admin.salles.update', $salle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Add your form fields here -->
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $salle->code }}">
            </div>

            <div class="mb-3">
                <label for="intitule" class="form-label">Intitulé</label>
                <input type="text" class="form-control" id="intitule" name="intitule" value="{{ $salle->intitule }}">
            </div>

            <div class="mb-3">
                <label for="batiment" class="form-label">Bâtiment</label>
                <select class="form-control" id="batiment" name="batiment">
                    <option value="">Sélectionner un bâtiment</option>
                    @foreach($batiments as $key => $value)
                        <option value="{{ $key }}" {{ $key == $salle->batiment_id ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="typesalle" class="form-label">Type de salle</label>
                <select class="form-control" id="typesalle" name="typesalle">
                    <option value="">Sélectionner un type de salle</option>
                    @foreach($typesalles as $key => $value)
                        <option value="{{ $key }}" {{ $key == $salle->typesalle_id ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection
