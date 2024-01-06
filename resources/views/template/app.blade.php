<!DOCTYPE html>

@if (\Request::is('rtl'))
  <html dir="rtl" lang="ar">
  @else
    <html lang="en">
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  {{-- @if (env('IS_DEMO'))
  <x-demo-metas></x-demo-metas>
  @endif --}}

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/template1/img/pmi.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/template1/img/pmi.png') }}">
  <title>
    {{ config('app.name') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/template1/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/template1/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/template1/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/template1/css/soft-ui-dashboard.css?v=1.0.3') }}">
  <!-- Custom CSS -->
  <link href="{{ asset('assets/template1/css/custom.css') }}" rel="stylesheet" />
  @stack('head')
</head>

<body
  class="g-sidenav-show {{ \Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '') }} bg-gray-100">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  {{-- @if (session()->has('success'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
    class="position-fixed bg-success right-3 rounded px-4 py-2 text-sm">
    <p class="m-0">{{ session('success') }}</p>
  </div>
  @endif --}}
  <!--   Core JS Files   -->
  @if (Route::is('dashboard'))
    <script src="{{ asset('assets/template1/js/core/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/template1/js/core/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('assets/template1/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/template1/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/template1/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/template1/js/plugins/chartjs.min.js') }}"></script>
  @endif

  <!-- Jquery -->
  <script src="{{ asset('assets/plugins/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>
  @auth
    @unless (Route::is('dashboard'))
      <!-- DataTables  & Plugins -->
      <script src="{{ asset('assets/plugins/DataTables/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/DataTables-1.13.1/js/dataTables.bootstrap5.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Responsive-2.4.0/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Responsive-2.4.0/js/responsive.bootstrap5.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/js/buttons.bootstrap5.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/js/buttons.colVis.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
      <script src="{{ asset('assets/plugins/moment/moment-timezone-data.js') }}"></script>
    @endunless
  @endauth
  <!-- Swal -->
  <script src="{{ asset('assets/plugins/SweetAlerts/dist/sweetalert2.min.js') }}"></script>
  <!-- Toastr -->
  <script src="{{ asset('assets/plugins/toastr/build/toastr.min.js') }}"></script>
  <!-- Template1 -->
  <script src="{{ asset('assets/template1/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/template1/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/template1/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/template1/js/core/bootstrap.min.js') }}"></script>
  @stack('rtl')
  @stack('scripts')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  {{--
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
  <script src="{{ asset('assets/template1/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
</body>

</html>
