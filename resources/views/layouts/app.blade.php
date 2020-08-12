<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Inventaris') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('on-server/js/fontawesome-all.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
				@if (Auth::check())
					<ul class="nav navbar-nav navbar-left">
                    <li><a href="/">Home</a></li>
                    <li><a href="/user/barang">Barang</a></li>
                    <li><a href="/pinjaman">Pinjaman Ku</a></li>
                    </ul>
				@endif	
                @if (Auth::guard("admin")->check())
                    {{-- expr --}}

                    <ul class="nav navbar-nav navbar-left">
                    <!--<li><a href="{{ url('/supplier') }}">Tambah Admin</a></li>-->
                    <li><a href="{{ url('/users') }}">User</a></li>
                    <li><a href="{{ url('/admin/pinjaman') }}">Pinjaman</a></li>
                    <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                    <li><a href="{{ url('/barang') }}">Barang</a></li>
                    <li><a href="{{ url('../lokasi') }}">Lokasi Barang</a></li>

                    @if (Auth::guard("admin")->user()->role==1)

                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Laporan <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                   <li><a href="{{ url('/laporan/barang-masuk') }}">Barang Masuk</a></li>
                                   <li><a href="{{ url('/laporan/barang-keluar') }}">Barang Keluar</a></li>
                                   <li><a href="{{ url('/laporan/peminjaman-barang') }}">Peminjaman Barang</a></li>
                                </ul>
                            </li> -->

                          <li><a href="{{ url('/database') }}">Database</a></li>
                                                @endif
                    </ul>
                @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
						@if (Auth::check())
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
						@elseif (Auth::guard("admin")->check())
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::guard("admin")->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admlgt') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admlgt') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
						@else
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li> <li><a href="{{ route('register') }}">Register</a></li>
						@endguest
						@endif
                    </ul>
                </div>
            </div>
        </nav>
				@if ($message = Session::get('info'))
				  <div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					  <strong>{{ $message }}</strong>
				  </div>
				@endif
				@if ($message = Session::get('error'))
				  <div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					  <strong>{{ $message }}</strong>
				  </div>
				@endif
        @yield('content')



<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
        <h4>Apakah Anda Akan Menghapus Data Ini?</h4>
      </div>
      <div class="modal-footer">
    <form action="" style="display: inline-block;" method="post" id="form-confirm">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"> OK</button>
    </form>

      </div>
    </div>

  </div>
</div>

@stack('data')

    </div>

    <!-- Scripts -->
{{--     <script src="{{ asset('js/app.js') }}"></script> --}}
                <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
    headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $(".delete-btn").click(function(){
            var act = $(this).attr('data-action');
            $("#form-confirm").attr('action',act);
        });
    });
    </script>
@stack('script')
</body>
</html>
