<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
  @yield('style')
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo-sekolah.png') }}" alt="">
        <span class="d-none d-lg-block" style="font-size: medium;">PKL SMK N 1 BANTUL</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">User</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>User</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('faq') }}">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Manajemen User -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('list-user', 'tambah-user') ? '' : 'collapsed' }}" data-bs-target="#User" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Manajemen User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="User" class="nav-content collapse {{ Request::is('list-user', 'tambah-user') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('list.user') }}" class="{{ Request::is('list-user') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tambah.user') }}" class="{{ Request::is('tambah-user') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah User</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Manajemen Role -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('list-role') ? '' : 'collapsed' }}" data-bs-target="#Role" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Manajemen Role</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Role" class="nav-content collapse {{ Request::is('list-role') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('list.role') }}" class="{{ Request::is('list-role') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>List Role</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Jurnal -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('jurnal') ? '' : 'collapsed' }}" data-bs-target="#jurnal" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Jurnal</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="jurnal" class="nav-content collapse {{ Request::is('jurnal') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('index.jurnal') }}" class="{{ Request::is('jurnal') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Jurnal Harian</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Laporan -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('laporan') ? '' : 'collapsed' }}" data-bs-target="#Laporan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Laporan" class="nav-content collapse {{ Request::is('laporan') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('laporan') }}" class="{{ Request::is('laporan') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Hasil Akhir</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Profile -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? '' : 'collapsed' }}" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <!-- FAQ -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('faq') ? '' : 'collapsed' }}" href="{{ route('faq') }}">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>

        <!-- Contact -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('contact') ? '' : 'collapsed' }}" href="{{ route('contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

  <main id="main" class="main">

    @yield('content')

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PKL SMKN 1 Bantul</span></strong>. All Rights Reserved
    </div>
  </footer>
  
  @yield('modal')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>
  @yield('script')
  
</body>
</html>