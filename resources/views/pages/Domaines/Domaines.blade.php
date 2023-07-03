@extends('layouts.master')
@section('css')
@toastr_css
    @section('title')
    Domaines
    @stop
        @endsection
        @section('page-header')
        <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> Domaines</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Domaines</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
        @endsection
        @section('content')
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            Ajouter
                        </button>
                        <br><br>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Responsable</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0?>
                                    @foreach($Domaines as $Domaine)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $Domaine->Name }}</td>
                                            <td>{{ $Domaine->Responsable }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $Domaine->id }}" title="Modifier"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $Domaine->id }}" title="Supprimer"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- edit_modal_Domaine -->
                                        <div class="modal fade" id="edit{{ $Domaine->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title" id="exampleModalLabel">
                                                            Modifier
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form
                                                            action="{{ route('Domaines.update','test') }}"
                                                            method="POST">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name" class="mr-sm-2">Nom:
                                                                    </label>
                                                                    <input id="Name" type="text" name="Name"
                                                                        class="form-control"
                                                                        value="{{ $Domaine->Name }}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="Responsable"
                                                                        class="mr-sm-2">Responsable:
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        name="Responsable"
                                                                        value="{{ $Domaine->Responsable }}">
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control" value="{{ $Domaine->id }}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-success">Modifier</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete_modal_Domaine -->
                                        <div class="modal fade" id="delete{{ $Domaine->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title" id="exampleModalLabel">
                                                            Supprimer
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('Domaines.destroy', 'test') }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            Etes-vous sure de vouloir supprimer les données ?
                                                            <br><br>
                                                            <input id="Name" type="text" name="Name"
                                                                        class="form-control"
                                                                        value="{{ $Domaine->Name }}" disabled>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $Domaine->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fermer</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add_modal_Domaine -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                Ajouter
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- add_form -->
                            <form action="{{ route('Domaines.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="Name" class="mr-sm-2">Nom:
                                        </label>
                                        <input id="Name" type="text" name="Name" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="Responsable" class="mr-sm-2">Responsable:
                                        </label>
                                        <input type="text" class="form-control" name="Responsable">
                                    </div>
                                </div>
                                <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
        @toastr_js
            @toastr_render
                @endsection