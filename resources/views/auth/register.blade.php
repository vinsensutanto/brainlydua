@extends('layouts.app')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/') }}">{{ config('app.name', 'Pengaduan Sekolah') }}</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register sebagai seorang admin baru</p>

      <form action="{{ route('register') }}" method="post">
      @csrf 
        <div class="input-group mb-3">
        <input id="username" placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input  placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Setuju mengikuti <a href="#">aturan</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="btn btn-block btn-success">
            <i class="fab fa-minus"></i> {{ __('Forgot Your Password?') }}
            </a>
            @endif
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="btn btn-block btn-danger">
            <i class="fab fa-plus"></i> {{ __('login') }}
            </a>
            @endif
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection
