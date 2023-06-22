<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>


  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') | AAIT </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/app/logo.png') }}" />
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn. s.net/v/bs4/dt-1.10.25/ s.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn. s.net/1.10.8/css/jquery. s.min.css"/>




  @yield('head_includes')
  <!-- Include Styles -->
  @include('layouts/sections/styles')
  @livewireStyles
  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')
  <style>
    #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 10px;
        margin: 10px;
        width: 1340px;
        height: 610px;
        border:2px solid black;
    }
</style>
<!-- JS -->

<script src="https://cdn. s.net/1.10.8/js/jquery. s.min.js" defer="defer"></script>

</head>

<body>
  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->

  {{-- remove while creating package --}}
  
  {{-- remove while creating package end --}}

  <!-- Include Scripts -->
  @livewireScripts
  @include('layouts/sections/scripts')
  
  <script type="text/javascript">
   $(document).ready(function() {
    $('.datatable '). ({
        responsive: true,
        autoWidth: false,
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "url": "//cdn. s.net/plug-ins/1.10.21/i18n/French.json"
        },
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    });
});
</script>

</body>

</html>
