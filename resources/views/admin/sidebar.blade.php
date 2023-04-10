<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/logo-siganteng.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Otak-otak') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user())
            @if(Auth::user()->foto!=0)
            <img src="{{asset('fotouser')}}/{{Auth::user()->foto}}" class="img-circle elevation-2" alt="">
            @endif
          @else
            <img src="{{asset('backend/dist/img/logo-siganteng.png')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          @if(Auth::user())
            <a href="{{ url('/profile') }}/{{Auth::user()->id}}" class="d-block">{{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->username }}}</a>
          @endif
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
            <a href="{{route('pertanyaan.index')}}" class="nav-link"><i class="nav-icon fas fa-question"></i>
              <p>
                Pertanyaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link"><i class="nav-icon fas fa-user-friends"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('komen.index')}}" class="nav-link"><i class="nav-icon fas fa-exclamation"></i>
              <p>
                Komentar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kelas.index')}}" class="nav-link"><i class="nav-icon fas fa-th"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kategori.index')}}" class="nav-link"><i class="nav-icon fas fa-file-signature"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          
          <li class="nav-header">Lainnya</li>
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