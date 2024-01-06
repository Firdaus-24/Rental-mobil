@extends('template.app')

@section('guest')
  @yield('content')
  @include('template.layouts.footers.guest.footer')
@endsection
