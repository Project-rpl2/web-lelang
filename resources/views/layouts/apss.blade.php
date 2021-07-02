<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('startbootstrap-simple-sidebar-gh-pages/assets/favicon.ico')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('startbootstrap-simple-sidebar-gh-pages/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">LelangLaravel</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/">Halaman Pertama</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/home">Home</a>

                    {{-- untuk mengecheck apakah rolenya --}}
                    @if(Auth::check())
                    {{-- untuk administrator --}}
                    @if(Auth::user()->role == 'administrator')
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('administrator')}}">Data User</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('barangs')}}">Data Barang</a>
                    @endif
                    {{-- untuk petugas --}}
                    @if(Auth::user()->role == 'petugas')
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('lelang')}}">Data Lelang</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('pelelang.pelelang')}}">Pemilihan Pemenang</a>
                    @endif 
                    {{-- untuk masyarakat --}}
                    @if(Auth::user()->role == 'masyarakat')
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('pelelang')}}">Lelang Barang</a>
                    @endif
                    @endif
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <i class="fa fa-bars" id="sidebarToggle" style="font-size:36px"></i>
                        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                            @if(Auth::check())
                            @if(Auth::user()->role == 'administrator')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{url('administrator/administrator')}}">Halaman Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('petugas')}}">Halaman Petugas</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'petugas')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('petugas')}}">Halaman Petugas</a>
                            </li>
                            @endif
                            <li class="nav-item">   
                                <a class="nav-link" href="{{url('masyarakat')}}">Halaman Masyarakat</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                            <!-- Example split danger button -->
                            <a class="nav-link dropdown-toggle pe-5 me-5" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            </li>
                            @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                @yield('content')
                <div class="row">
                    @yield('grid')
                </div>
                </div>
            </div>
        </div>
        
        <footer class="bg-white text-center text-lg-start">
            <!-- Copyright -->
            <div class="bg-light text-center p-3">
            © 2021 Copyright:
            <a class="text-dark" href="http://127.0.0.1:8000">Lelang Laravel</a>
            </div>
            <!-- Copyright -->
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('startbootstrap-simple-sidebar-gh-pages/js/scripts.js')}}"></script>
    </body>
</html>