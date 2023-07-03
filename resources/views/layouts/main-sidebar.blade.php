<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('board') }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Tableau de bord</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item domaines -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Domaines</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Domaines.index')}}">Liste des Domaines</a></li>
                        </ul>
                    </li>
                    <!-- menu item themes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Thèmes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Themes.index')}}">Liste des thèmes</a> </li>
                        </ul>
                    </li>
                    
                    <!-- menu item exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Examens</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Exams.index')}}">Liste des examens</a> </li>
                            <li> <a href="{{route('questions.index')}}">Liste des questions</a> </li>
                            <li> <a href="{{route('candidat_exams.index')}}">Candidat Examen</a> </li>
                        </ul>
                    </li>
                    @if (Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{route('admin.users.index')}}"><i class="fa fa-book"></i><span class="right-nav-text">Utilisateurs</span> </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('dashboard')}}"><i class="fa fa-book"></i><span class="right-nav-text">DashBoard</span> </a>
                    </li>
                    <!-- menu item libraries-->
                    <li>
                        <a href="{{route('library.index')}}"><i class="fa fa-book"></i><span class="right-nav-text">Bibliothèque</span> </a>
                    </li>
                   

                    
                    
                    
                    
                    
                    
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
