@extends('layouts.master')
@section('css')
    @toastr_css
    
    @section('title')
    Passer l'examen
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    Passer l'examen 
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')


    @livewire('show-question', ['exam_id' => $exam_id])

@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
    
@endsection