@extends('template.layouts.auth')
@push('head')
  <!-- Toastr-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/build/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/build/style.css') }}">
@endpush
@section('content')
  <div>
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('{{ asset('assets/template1/img/curved-images/Human-6.png') }}'); background-position-y: 50%;">
        <span class="mask bg-gradient-danger opacity-3"></span>
      </div>
      <div class="card card-body shadow-blur mt-n6 mx-4 blur">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('assets/template1/img/user.png') }}" alt="..."
                class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ $user->name }}
              </h5>
              <p class="font-weight-bold mb-0 text-sm">
                {{ $division->name . ' / ' . $user->role }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="card-header px-3 pb-0">
          <h6 class="mb-0">{{ __('Informasi Profil') }}</h6>
        </div>
        <div class="card-body p-3 pt-4">
          <form action="{{ route('profil.update') }}" method="POST" role="form text-left" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @if ($errors->any())
              <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                <span class="alert-text text-white">
                  {{ $errors->first() }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="fa fa-close" aria-hidden="true"></i>
                </button>
              </div>
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                  <div class="@error('user.name')border border-danger rounded-3 @enderror">
                    <input class="form-control" value="{{ Auth::user()->name }}" type="text" placeholder="Name"
                      id="user-name" name="name">
                    @error('name')
                      <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                  <div class="@error('email')border border-danger rounded-3 @enderror">
                    <input class="form-control" value="{{ Auth::user()->email }}" type="email"
                      placeholder="@example.com" id="user-email" name="email">
                    @error('email')
                      <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user-username" class="form-control-label">{{ __('Username') }}</label>
                  <div class="@error('user.username')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Username" id="user-username" name="username"
                      value="{{ Auth::user()->username }}">
                    <div id="username-error"></div>
                    @error('username')
                      <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user.password" class="form-control-label">{{ __('Password') }}</label>
                  <div class="@error('user.password')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="password" placeholder="password" id="password" name="password">
                    @error('password')
                      <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                    <label style="font-family: sans-serif; font-size:12px !important; "
                      class="fs-6 text-danger fst-italic fw-bold">*
                      Biarkan kosong jika password tidak ingin diubah</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="d-flex justify-content-end">
                <button type="submit" id="btnChanges"
                  class="btn bg-gradient-danger btn-md mb-4 mt-4">{{ 'Ubah dan Simpan' }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      $(function() {
        $('#user-username').on('keypress', function(e) {
          if (e.which == 32) {
            return false;
          }
        });
      });

      $('#user-username').on('keyup', function() {
        var username = $(this).val();
        $.ajax({
          url: '{{ route('check.username') }}',
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            username: username
          },
          success: function(response) {
            if (response.exists) {
              $('#username-error').html(
                '<p class="text-danger mt-2 text-xs">Username sudah ada, silahkan gunakan username lain</p>'
              );
              $('#user-username').addClass('is-invalid');
              $('#btnChanges').prop('disabled', true);
            } else {
              $('#username-error').empty();
              $('#user-username').removeClass('is-invalid');
              $('#btnChanges').prop('disabled', false);
            }
          }
        });
      });

    });

    @if (session('success'))
      toastr.success('{{ session('success') }}', 'Berhasil', {
        closeButton: true,
        progressBar: true,
        timeOut: 3000,
        positionClass: 'toast-bottom-right'
      });
    @elseif (session('warning'))
      toastr.warning('{{ session('warning') }}', 'Peringatan', {
        closeButton: true,
        progressBar: true,
        timeOut: 4000,
        positionClass: 'toast-bottom-right'
      });
    @elseif (session('error'))
      toastr.error('{{ session('error') }}', 'Gagal', {
        closeButton: true,
        progressBar: true,
        timeOut: 4000,
        positionClass: 'toast-bottom-right'
      });
    @endif
  </script>
@endpush
