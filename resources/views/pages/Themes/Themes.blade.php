@extends('layouts.master')
@section('css')
@toastr_css
    @section('title')
    empty
    @stop
        @endsection
        @section('page-header')
        <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> Classes</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Page Title</li>
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
                        <button type="button" class="button x-small" id="btn_delete_all">
                            Supprimer
                        </button>
                        <br><br>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="example-select-all" onclick="Checkall('box1',this)" /></th>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Domaine</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0?>
                                    @foreach($Themes as $Theme)
                                        <tr>
                                            <?php $i++; ?>
                                            <td><input type="checkbox" value="{{$Theme->id}}" class="box1"></td>
                                            <td>{{ $i }}</td>
                                            <td>{{ $Theme->Name_Theme }}</td>
                                            <td>{{ $Theme->Description_Theme }}</td>
                                            <td>{{ $Theme->Domaines->Name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $Theme->id }}" title="Modifier"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $Theme->id }}" title="Supprimer"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- edit_modal_Domaine -->

                                        <div class="modal fade" id="edit{{ $Theme->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            action="{{ route('Themes.update', 'test') }}"
                                                            method="post">
                                                            {{ method_field('patch') }}
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name" class="mr-sm-2">Nom de la classe
                                                                        :</label>
                                                                    <input id="Name" type="text" name="Name"
                                                                        class="form-control"
                                                                        value="{{ $Theme->Name_Theme }}" required>
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control"
                                                                        value="{{ $Theme->id }}">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="Name_en" class="mr-sm-2">Description
                                                                        :</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $Theme->Description_Theme }}"
                                                                        name="Description" required>
                                                                </div>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">Niveau
                                                                    :</label>
                                                                <select class="form-control form-control-lg"
                                                                    id="exampleFormControlSelect1" name="Domaine_id">

                                                                    @foreach($Domaines as $Domaine)
                                                                        <option value="{{ $Domaine->id }}">
                                                                            {{ $Domaine->Name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fermer</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Enregistrer</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete_modal_Domaine -->
                                        <div class="modal fade" id="delete{{ $Theme->id }}" tabindex="-1"
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
                                                            action="{{ route('Themes.destroy', 'test') }}"
                                                            method="post">
                                                            {{ method_field('Delete') }}
                                                            @csrf
                                                            Etes vous sûre de vouloir suprimer cette classe ?
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $Theme->id }}">
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                Ajouter une classe
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class=" row mb-30" action="{{ route('Themes.store') }}"
                                method="POST">
                                @csrf

                                <div class="card-body">
                                    <div class="repeater">
                                        <div data-repeater-list="List_Themes">
                                            <div data-repeater-item>

                                                <div class="row">

                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">Nom de la classe
                                                            :</label>
                                                        <input class="form-control" type="text" name="Name" />
                                                    </div>


                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">Description
                                                            :</label>
                                                        <input class="form-control" type="text" name="Description" />
                                                    </div>


                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Niveau
                                                            :</label>

                                                        <div class="box">
                                                            <select class="fancyselect" name="Domaine_id">
                                                                @foreach($Domaines as $Domaine)
                                                                    <option value="{{ $Domaine->id }}">
                                                                        {{ $Domaine->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">Operation
                                                            :</label>
                                                        <input class="btn btn-danger btn-block" data-repeater-delete
                                                            type="button" value="Supprimer" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-12">
                                                <input class="button" data-repeater-create type="button"
                                                    value="Ajouter" />
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-success">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- delete_all_modal -->
        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            Supprimer
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('delete_all') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            Etes vous sûre de vouloir suprimer ces données ?
                            <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                        </div>

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
        <!-- row closed -->
        @endsection
        @section('js')
        @toastr_js
        @toastr_render

        <script>
            function Checkall(className, elem) {
                var elements = document.getElementsByClassName(className);
                var l = elements.length;

                if(elem.checked)    {
                    for(var i = 0; i<l; i++)    {
                        elements[i].checked = true;
                    }
                } else  {
                    for(var i = 0; i<l; i++)    {
                        elements[i].checked = false;
                    }
                }
            }

            $(function()    {
                $("#btn_delete_all").click(function()   {
                    var selected = new Array();
                    $("#datatable input[type=checkbox]:checked").each(function()    {
                        selected.push(this.value);
                    });

                    if (selected.length > 0) {
                        $('#delete_all').modal('show')
                        $('input[id="delete_all_id"]').val(selected);
                    }
                });
            });
        </script>
        @endsection