<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apoteke App</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- choose one -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <style>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");
          @import url("https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&display=swap");
          body{
            font-family: "Poppins", sans-serif;
            /* background-color: rgb(39, 37, 37); */
          }
        </style>    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-primary-subtle fs-5">
            <div class="container">
              <a class="navbar-brand fs-4 text-bold" href="{{ route('home.page') }}">Apotek App</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                  </li>
                  @if (Auth::check())
                    @if (Auth::user()->role == "admin")
                      <li class="nav-item dropdown">
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Obat
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('medicine.home') }}">Data Obat</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicine.create') }}">Tambah Obat</a></li>
                        <li><a class="dropdown-item" href="{{ route('medicine.stock') }}">Stock</a></li>
                        </ul>
                      </li>

                      <li class="nav-items">
                        <a class="nav-link" aria-current="page" href="{{ route('order.data')}}">Pembelian</a>
                      </li>

                        <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><i data-feather="user"></i></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item"  href="{{ route('pengguna.home') }}" >Kelola Akun</a></li>
                        <li><a class="dropdown-item" href="{{ route('pengguna.create') }}">Tambah User</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" >Logout</a></li>
                      </ul>
                    </li>
                    @else
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('kasir.order.index') }}">Pembelian</a>
                      </li>
                  @endif
                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                </li>
                @endif
                </ul>
              </div>
            </div>
        </nav>

        <div class="container mt-5">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          feather.replace();
        </script>
        @stack('script')
    </body>
</html>
