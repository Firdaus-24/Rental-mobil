<!-- Navbar -->
<nav class="px-0 mx-4 shadow-none navbar navbar-main navbar-expand-lg border-radius-xl" id="navbarBlur"
  navbar-scroll="true">
  <div class="px-3 py-1 container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="px-0 pt-1 pb-0 mb-0 bg-transparent breadcrumb me-sm-6 me-5">
        <li class="text-sm breadcrumb-item"><a class="text-dark opacity-5" href="javascript:;">Pages</a></li>
        {{-- <li class="text-sm breadcrumb-item text-dark active text-capitalize" aria-current="page">
          {{ Route::is('amprah.detail') || Route::is('amprah.form-edit') || Route::is('surat.detail') || Route::is('surat.form-edit') || Route::is('hapus-soap.show') || Route::is('jadwal-dokter.show') || Route::is('konten-plasma.show') ? str_replace('-', ' ', explode('/', Request::path())[0] . '/' . explode('/', Request::path())[1]) : str_replace('-', ' ', Request::path()) }}
        </li> --}}
      </ol>
      {{-- <h6 class="mb-0 font-weight-bolder text-capitalize">
        {{ Route::is('amprah.detail') || Route::is('amprah.form-edit') || Route::is('surat.detail') || Route::is('surat.form-edit') || Route::is('hapus-soap.show') || Route::is('konten-plasma.show') || Route::is('jadwal-dokter.show') ? str_replace('-', ' ', explode('/', Request::path())[0] . '/' . explode('/', Request::path())[1]) : str_replace('-', ' ', Request::path()) }}
      </h6> --}}
    </nav>
    <div class="mt-2 navbar-collapse mt-sm-0 me-md-0 me-sm-4 d-flex justify-content-end collapse" id="navbar">
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item dropdown d-flex align-items-center">
          <a href="javascript:void(0)" class="px-0 nav-link dropdown-toggle text-body font-weight-bold"
            id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            {{-- <li>
              <a href="{{ route('profil') }}" class="dropdown-item">Profil</a>
            </li> --}}
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                  class="dropdown-item">Keluar</a>
              </form>
            </li>
          </ul>
        </li>
        {{-- <li class="nav-item d-xl-none d-flex align-items-center ps-3">
          <a href="javascript:;" class="p-0 nav-link text-body" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="px-3 nav-item d-flex align-items-center">
          <a href="javascript:;" class="p-0 nav-link text-body">
            <i class="cursor-pointer fa fa-cog fixed-plugin-button-nav"></i>
          </a>
        </li> --}}
      </ul>
    </div>
    <script>
      function toggleUserDropdown() {
        var userDropdown = document.getElementById('userDropdown');
        userDropdown.nextElementSibling.classList.toggle('show');
      }
    </script>

  </div>
</nav>
<!-- End Navbar -->
