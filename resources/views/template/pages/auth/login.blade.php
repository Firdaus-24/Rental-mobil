@extends('template.layouts.guest')

@section('content')
  <style>
    .bg-danger {
      opacity: 0.8;
    }

    .satu {
      color: red;
      opacity: ;
    }
  </style>
  <main class="mt-0 main-content">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="mx-auto col-xl-4 col-lg-5 col-md-6 d-flex flex-column">
              <div class="mt-8 card card-plain">
                {{-- <div class="pb-0 text-left bg-transparent card-header">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Create a new acount<br></p>
                  <p class="mb-0">OR Sign in with these credentials:</p>
                  <p class="mb-0">Email <b>admin@softui.com</b></p>
                  <p class="mb-0">Password <b>secret</b></p>
                </div> --}}
                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="" aria-label="Email" aria-describedby="email-addon">
                      @error('email')
                        <p class="mt-2 text-xs text-danger">{{ $message }}</p>
                      @enderror
                    </div> --}}
                    <label>Username/Email</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="userAccount" id="userAccount"
                        placeholder="Username atau Email" value="" aria-label="Username atau Email"
                        aria-describedby="userAccount-addon">
                      @error('userAccount')
                        <p class="mt-2 text-xs text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        value="" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="mt-2 text-xs text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="mt-2 mb-0 text-white btn bg-danger w-100">Masuk</button>
                    </div>
                    <div class="text-center">
                      <a href="{{ Route('hapus-soap.form-guest') }}"
                        class="mt-2 mb-0 text-white btn bg-primary w-100">Form
                        Hapus SOAP</a>
                    </div>
                  </form>
                </div>
                {{-- <div class="px-1 pt-0 text-center card-footer px-lg-2">
                  <small class="text-muted">Lupa Kata Sandi? Reset Kata Sandi
                    <a href="/login/forgot-password" class="satu">Disini</a>
                  </small>
                  <p class="mx-auto mb-4 text-sm">
                    Tidak Punya Akun?
                    <a href="register" class="satu">Daftar</a>
                  </p>
                </div> --}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="top-0 oblique position-absolute h-100 d-md-block d-none me-n8">
                <div class="bg-cover oblique-image position-absolute fixed-top h-100 z-index-0 ms-n11 ms-auto"
                  style="background-image:url({{ asset('assets/template1/img/curved-images/m.png') }})"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
