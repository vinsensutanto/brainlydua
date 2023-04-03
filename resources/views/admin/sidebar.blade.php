<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/logo-siganteng.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Pengaduan Sekolah') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/logo-siganteng.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->username }}}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('input.index')}}" class="nav-link"><i class="nav-icon fas fa-th"></i>
              <p>
                Input Pelaporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('siswa.index')}}" class="nav-link"><i class="nav-icon fas fa-th"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kategori.index')}}" class="nav-link"><i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Admin
              </p>
            </a>
          </li> --}}
          
          <li class="nav-header">Lainnya</li>

          {{-- <li class="nav-item">
            <a href="{{url('/laporan')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Report</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ url('/laporan/cetak') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Print Out</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>{{ __('Logout') }}</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </a>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>