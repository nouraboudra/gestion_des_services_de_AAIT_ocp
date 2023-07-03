@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Liste des examens
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Liste des examens 
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('Exams.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Ajouter un nouveau examen</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom d'examen </th>
                                            <th>Domaine</th>
                                            <th>Thème </th>
                                            <th>Operations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$exam->Name}}</td>
                                                <td>{{$exam->Domaine->Name}}</td> 
                                                <td>{{$exam->Theme->Name_Theme}}</td>
                                                <td>
                                                    <a href="{{route('Exams.edit',$exam->id)}}"
                                                       class="btn btn-info btn-sm" title="modifier" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $exam->id }}" title="supprimer"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="{{route('Exams.show',$exam->id)}}"
                                                        class="btn btn-warning btn-sm" title="afficher les questions" role="button" aria-pressed="true"><i
                                                        class="fa fa-binoculars"></i></a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_exam{{$exam->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Exams.destroy', $exam->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> Etes vous sûre de vouloir supprimer l'examen {{$exam->Name}} ?</p>
                                                                <input type="hidden" name="id" value="{{gettype($exam->id)}}" disabled>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Fermer</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">Supprimer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
