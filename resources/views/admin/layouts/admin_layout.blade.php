@extends('layouts.main_layout')

@section('css_extend')
    <!-- CUSTOM STYLES-->
    <link href="{{ asset('css/admin_layout.css') }}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
@endsection

@section('js_extend')
    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('js/admin_layout.js') }}"></script>
@endsection
@section('main_content')
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top" >
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                    <img width="30%" height="30%" src="{{ asset('images/home/logo.png') }}" />
                    </a>
                </div>
                <span class="logout-spn" >
                <a href="{{ route('index') }}" style="color:#fff;">BACK TO HOME</a>  
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="{{ isset($categories) ? 'active-link' : ''}}">
                        <a href="{{route('categories')}}"><i class="fa fa-bars" aria-hidden="true"></i> Manage Category</a>
                    </li>
                    <li class="{{ isset($cities) ? 'active-link' : ''}}">
                        <a href="{{route('cities')}}"><i class="fa fa-arrows" aria-hidden="true"></i> Manage City </a>
                    </li>
                    <li class="{{ isset($publishers) ? 'active-link' : ''}}">
                        <a href="{{route('publishers')}}"><i class="fa fa-book" aria-hidden="true"></i> Manage Publisher </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                @yield('content');
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

@endsection