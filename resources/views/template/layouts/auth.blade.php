@extends('template.app')

@section('auth')
  @if (\Request::is('static-sign-up'))
    @include('template.layouts.navbars.guest.nav')
    @yield('content')
    {{-- Start Modal --}}
    @yield('modal')
    {{-- End Modal --}}
    @include('template.layouts.footers.guest.footer')
  @elseif (\Request::is('static-sign-in'))
    @include('template.layouts.navbars.guest.nav')
    @yield('content')
    {{-- Start Modal --}}
    @yield('modal')
    {{-- End Modal --}}
    @include('template.layouts.footers.guest.footer')
  @else
    {{-- @if (\Request::is('profile'))
      @include('template.layouts.navbars.auth.sidebar')
      <div class="main-content position-relative max-height-vh-100 h-100 bg-gray-100">
        @include('template.layouts.navbars.auth.nav')
        @yield('content')

        {{-- Start Modal --}}
    {{-- @yield('modal') --}}
    {{-- End Modal --}}
    {{-- </div>  --}}
    @if (\Request::is('virtual-reality'))
      @include('template.layouts.navbars.auth.nav')
      <div class="border-radius-xl position-relative mx-3 mt-3"
        style="background-image: url({{ asset('assets/template1/img/vr-bg.jpg') }}) ; background-size: cover;">
        @include('template.layouts.navbars.auth.sidebar')
        <main class="main-content border-radius-lg mt-1">
          @yield('content')

          {{-- Start Modal --}}
          @yield('modal')
          {{-- End Modal --}}
        </main>
      </div>
      @include('template.layouts.footers.auth.footer')
    @else
      @include('template.layouts.navbars.auth.sidebar')
      <main
        class="main-content position-relative max-height-vh-100 h-100 border-radius-lg {{ Request::is('rtl') ? 'overflow-hidden' : '' }} mt-1">
        @include('template.layouts.navbars.auth.nav')
        <div class="container-fluid py-4">
          @yield('content')

          {{-- Start Modal --}}
          @yield('modal')
          {{-- End Modal --}}
          @include('template.layouts.footers.auth.footer')
        </div>
      </main>
    @endif

    @include('template.components.fixed-plugin')
  @endif



@endsection
