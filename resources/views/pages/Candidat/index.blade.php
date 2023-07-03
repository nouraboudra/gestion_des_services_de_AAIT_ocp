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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Theme </th>
                                            <th>Nom de l'examen </th>
                                            <th>Note / Entrer </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$exam->Theme->Name_Theme}}</td>
                                                <td>{{$exam->Name}}</td>
                                                <td>
                                                    <a href="{{route('candidat_exams.show',$exam->id)}}"
                                                       class="btn btn-outline-success btn-sm" role="button"
                                                       aria-pressed="true" onclick="alertAbuse()">
                                                       <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
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

    {{--    <script>--}}
    {{--        function alertAbuse() {--}}
    {{--            alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");--}}
    {{--        }--}}
    {{--    </script>--}}

@endsection