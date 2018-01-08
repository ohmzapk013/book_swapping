@extends('layouts.main_layout')
@section('main_content')
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('index') }}"><img width="30%" height="30%" src="/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('add_book')}}"><i class="fa fa-plus" aria-hidden="true"> Add Book</i></a></li>
                            <li><a href="{{ route('my_book') }}"><i class="fa fa-book" aria-hidden="true"></i> My Book</a></li>
                            <li><a href="{{ route('update_profile')}}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            @guest
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-sign-in"></i> Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('index') }}" class="active">Home</a></li>
                            @auth
                                @if (Auth::user()->level == 1)
                                <li><a href="{{ route('categories') }}">Menu Manage</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
<!--                     <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div> -->
                    <form action="{{ route('index') }}" method="GET">
                        <div class="input-group add-on pull-right">
                            <input class="form-control" placeholder="Search" name="search" type="text" value="{{ app('request')->input('search') }}">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
    @yield('home_content')
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                    <div class="single-widget">
                        <h2>Your Email</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2017 All rights reserved.</p>
            </div>
        </div>
    </div>
    
</footer><!--/Footer-->
@endsection