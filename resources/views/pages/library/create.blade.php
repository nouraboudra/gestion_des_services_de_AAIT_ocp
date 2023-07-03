@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Ajouet un nouveau document
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Ajouter un nouveau document
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('library.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">Nom du document </label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Domaine_id"> Domaine : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Domaine_id" onchange="console.log($(this).val())">
                                                <option selected disabled>Choisir...</option>
                                                @foreach($Domaines as $Domaine)
                                                    <option  value="{{ $Domaine->id }}">{{ $Domaine->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Theme_id">Theme: <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Theme_id">
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id">

                                            </select>
                                        </div>
                                    </div> --}}

                                </div><br>



                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="academic_year">Pièces jointes : <span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf" name="file_name" required>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Enregistrer</button>
                            </form>
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
    <script>
        $(document).ready(function () {
            $('select[name="Domaine_id"]').on('change', function () {
                var Domaine_id = $(this).val();
                if (Domaine_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Domaine_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Theme_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Theme_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
