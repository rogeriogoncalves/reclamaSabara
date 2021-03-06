<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/feed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar-style.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body>

<div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>

    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content pt-lg-5">
            <div class="sidebar-brand">
                <a href="/">
                    <img src="{{ asset('images/logo-branco.png') }}"/>
                </a>

                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <a href="{{route('usuario.edit', ['usuario' => Auth::user()->id])}}">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{ asset(Auth::user()->photo) }}"
                             alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>{{ Auth::user()->name }}</strong>
                        </span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </a>
            </div>

            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <form method="get" action="{{route('reclamar.search')}}">
                            {!! csrf_field() !!}
                        <input type="text" class="form-control search-menu" placeholder="Buscar reclamação..." name="busca">
                        <div class="input-group-append">
                            <button class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <!-- sidebar-session-options -->
                <ul>
                    <li class="header-menu">
                        <span>Sessão</span>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sair</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="/">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="/">Dashboard 1
                                        <span class="badge badge-pill badge-success">Pro</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="/reclamar">
                            <i class="fa fa-plus-square"></i>
                            <span>Fazer Reclamação</span>
                            <span class="badge badge-pill badge-primary">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reclamar.myComplaints', ['usuario' => Auth::user()->id])}}">
                            <i class="fa fa-folder"></i>
                            <span>Minhas Reclamações</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="far fa-gem"></i>
                            <span>Components</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">General</a>
                                </li>
                                <li>
                                    <a href="#">Panels</a>
                                </li>
                                <li>
                                    <a href="#">Tables</a>
                                </li>
                                <li>
                                    <a href="#">Icons</a>
                                </li>
                                <li>
                                    <a href="#">Forms</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <div class="dropdown">

                <a href="#" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                    <div class="notifications-header">
                        <i class="fa fa-bell"></i>
                        Notifications
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="notification-content">
                            <div class="icon">
                                <i class="fas fa-check text-success border border-success"></i>
                            </div>
                            <div class="content">
                                <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. In totam explicabo
                                </div>
                                <div class="notification-time">
                                    6 minutes ago
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="notification-content">
                            <div class="icon">
                                <i class="fas fa-exclamation text-info border border-info"></i>
                            </div>
                            <div class="content">
                                <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. In totam explicabo
                                </div>
                                <div class="notification-time">
                                    Today
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="notification-content">
                            <div class="icon">
                                <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                            </div>
                            <div class="content">
                                <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. In totam explicabo
                                </div>
                                <div class="notification-time">
                                    Yesterday
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="#">View all notifications</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <div class="dropdown-menu messages" aria-labelledby="dropdownMenuMessage">
                    <div class="messages-header">
                        <i class="fa fa-envelope"></i>
                        Messages
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <div class="message-content">
                            <div class="pic">
                                <img src="{{ asset('images/feed/user.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="message-title">
                                    <strong> {{ Auth::user()->name }} </strong>
                                </div>
                                <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                    totam explicabo
                                </div>
                            </div>
                        </div>

                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="message-content">
                            <div class="pic">
                                <img src="{{ asset('images/feed/user.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="message-title">
                                    <strong> {{ Auth::user()->name }}</strong>
                                </div>
                                <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                    totam explicabo
                                </div>
                            </div>
                        </div>

                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="message-content">
                            <div class="pic">
                                <img src="{{ asset('images/feed/user.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="message-title">
                                    <strong> {{ Auth::user()->name }}</strong>
                                </div>
                                <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                                    totam explicabo
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="#">View all messages</a>

                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                    <a class="dropdown-item" href="#">My profile</a>
                    <a class="dropdown-item" href="#">Help</a>
                    <a class="dropdown-item" href="#">Setting</a>
                </div>
            </div>
            <div>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="form-group col-md-12">
                    @yield('content')
                </div>
            </div>
            <hr>
        </div>
    </main>
    <!-- page-content" -->
</div>
<!-- page-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('js/feed.js') }}"></script>

</body>
</html>