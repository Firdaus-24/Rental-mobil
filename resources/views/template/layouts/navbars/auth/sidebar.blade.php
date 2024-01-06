<aside class="my-3 bg-white border-0 sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start ms-3"
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="top-0 p-3 cursor-pointer fas fa-times text-secondary position-absolute d-none d-xl-none end-0 opacity-5"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="m-0 align-items-center d-flex navbar-brand text-wrap" href="{{ route('dashboard') }}">
      <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img h-100" alt="...">
      <span class="font-weight-bold ms-3">Rental Mobil </span>
    </a>
  </div>
  <hr class="mt-0 horizontal dark">
  <div class="w-auto navbar-collapse collapse" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div
            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2">
            <i style="font-size: 1rem;"
              class="fa fa-dashboard {{ Route::is('dashboard') ? 'text-white' : 'text-dark' }} pe-2 ps-2 text-center"
              aria-hidden="true">
            </i>
          </div>
          <span class="nav-item ms-1">Dashboard</span>
        </a>
      </li>
      <li class="mt-2 nav-item">
        <h6 class="text-xs text-uppercase font-weight-bolder opacity-6 ms-2 ps-4">Master</h6>
      </li>
      <li class="pb-2 nav-item">
        <a class="nav-link {{ Route::is('master.mobil') ? 'active' : '' }}" href="{{ Route('master.mobil') }}">
          <div
            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2">
            <i style="font-size: 1rem;"
              class="fas fa-reguler fa-car text-dark {{ Route::is('master.mobil') ? 'text-white' : 'text-dark' }} pe-2 ps-2 text-center"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Mobil</span>
        </a>
      </li>
      <li class="pb-2 nav-item">
        <a class="nav-link {{ Route::is('master.transaction') ? 'active' : '' }}"
          href="{{ Route('master.transaction') }}">
          <div
            class="text-center bg-white shadow icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2">
            <i style="font-size: 1rem;"
              class="fas fa-reguler fa-car text-dark {{ Route::is('master.transaction') ? 'text-white' : 'text-dark' }} pe-2 ps-2 text-center"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Transactions</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
