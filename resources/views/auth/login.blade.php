@extends('layouts.app')

@section('content')
    <section>
        {{-- <div class="container-fluid "> --}}
        <div class="row">
            <div class="col-md-6 d-md-block">
                <img src="images/background-new.jpg" alt="Login image" class="w-100 vh-100"
                    style="object-fit: cover; object-position: left;">
            </div>
            <div class="col-md-6 align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                            <span class="h1 fw-bold mb-0">Logo</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                        <div class="form-outline mb-4">
                            <input id="email" type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input id="password" type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>

                        </div>

                        <div class="pt-1 mb-4">
                            <button type="submit" class="btn btn-dark btn-lg btn-block">
                                {{ __('Login') }}
                            </button>    
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a class="small text-muted" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">No tienes cuenta?
                            @if (Route::has('register'))
                                <a style="color: #393f81;" href="{{ route('register') }}">Registrate</a>
                                {{-- <a style="color: #393f81;" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            @endif
                        </p>
                        <a href="#!" class="small text-muted">Teminos de uso.</a>
                        <a href="#!" class="small text-muted">Politicas de privacidad</a>
                    </form>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
@endsection
