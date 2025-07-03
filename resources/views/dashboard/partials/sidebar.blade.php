  <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                  <img src="{{ asset('kai-admin/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                      class="navbar-brand" height="20" />
              </a>
              <div class="nav-toggle">
                  <button class="btn btn-toggle toggle-sidebar">
                      <i class="gg-menu-right"></i>
                  </button>
                  <button class="btn btn-toggle sidenav-toggler">
                      <i class="gg-menu-left"></i>
                  </button>
              </div>
              <button class="topbar-toggler more">
                  <i class="gg-more-vertical-alt"></i>
              </button>
          </div>
          <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
              <ul class="nav nav-secondary">
                  <li class="nav-item">
                      <a href="dashboard.html">
                          <i class="fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                          <span class="badge badge-success">4</span>
                      </a>
                  </li>
                   <li class="nav-item" class="{{request()->is('iser*') ? 'active' : ''}}">
                      <a href="{{route('user.index')}}" >
                          <i class="fas fa-user"></i>
                          <p>User</p>
                          <span class="badge badge-warning">3</span>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
                      <a href="{{route('ibu-hamil.index')}}" class="{{request()->is('ibu-hamil*') ? 'active' : ''}}">
                          <i class="fas fa-user-friends"></i>
                          <p>Data Ibu Hamil</p>
                          <span class="badge badge-warning">3</span>
                      </a>
                  </li> --}}
                  <li class="nav-item" class="{{request()->is('input-data*') ? 'active' : ''}}">
                      <a href="{{route('input-data.index')}}" >
                          <i class="fas fa-list"></i>
                          <p>Hasil Input Data</p>
                          <span class="badge badge-info">2</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="hasil-ahp.html">
                          <i class="fas fa-chart-pie"></i>
                          <p>Hasil AHP</p>
                          <span class="badge badge-primary">1</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('menu.index')}}">
                          <i class="fas fa-store"></i>
                          <p>Menu Tersedia</p>
                          <span class="badge badge-info">1</span>
                      </a>
                  </li>
                  <li class="nav-item {{request()->is('makanan*') ? 'active' : ''}}">
                      <a href="{{route('makanan.index')}}" class=" ">
                          <i class="fas fa-utensils"></i>
                          <p>Makanan</p>
                          <span class="badge badge-secondary">1</span>
                      </a>
                  </li>
                  {{-- <li class="nav-item">
                      <a href="widgets.html">
                          <i class="fas fa-image"></i>
                          <p>Gallery</p>
                          <span class="badge badge-danger">4</span>
                      </a>
                  </li> --}}
              </ul>
          </div>
      </div>
  </div>
