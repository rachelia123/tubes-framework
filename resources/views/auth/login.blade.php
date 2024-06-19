@extends('layouts.loginan')

@section('content')
    {{-- <div class="wrapper">
    <div class="logo">
        <img src="{{ Vite::asset('resources/images/logoittscoffe.svg') }}" alt="">
    </div>
    <div class="text-center mt-4 name">
        ITTS COFFEE
    </div>
    <form method="POST" action="{{ route('login') }}" class="p-3 mt-3">
        @csrf
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check d-flex align-items-center">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                   {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
        </div>
        <button type="submit" class="btn mt-3">{{ __('Login') }}</button>
    </form>
    <div class="text-center fs-6">
        Dont have an account? <a href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
</div> --}}
    <section class="vh-150" style="background-color: #A27B5C; ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-12 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-flex align-items-center flex-column mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0 text-center">Telkom University Coffee
                                                Surabaya</span>
                                        </div></br>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                        </h5>

                                        <div data-mdb-input-init class="form-outline mb-4">

                                            <label class="form-label" for="email">Email address</label>
                                            <input type="email" id="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                name="email"value="{{ old('email') }}" required autocomplete="email" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="pt-1 mb-4 d-flex justify-content-center">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg" type="submit" style="width: 100%;">Login</button>
                                        </div>


                                        <p class="mb-5 pb-lg-2 text-center" style="color: #393f81;">Belum punya akun? <a href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
