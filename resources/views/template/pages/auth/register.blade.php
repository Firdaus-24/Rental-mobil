@extends('template.layouts.guest')

@section('content')
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 border-radius-lg mx-3 pt-5 pb-11"
      style="background-image:url({{ asset('assets/template1/img/curved-images/curved14.jpg') }})">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header pt-4 text-center">
              <h5>Register Account</h5>
            </div>
            <div class="card-body">
              <form role="form text-left" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Name" name="name" id="name"
                    aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                  @error('name')
                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                    aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                  @error('email')
                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                    aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                  @error('agreement')
                    <p class="text-danger mt-2 text-xs">First, agree to the Terms and Conditions, then try register again.
                    </p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                </div>
                <p class="mt-3 mb-0 text-sm">Already have an account? <a href="login"
                    class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection