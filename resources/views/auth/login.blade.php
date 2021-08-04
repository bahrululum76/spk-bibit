@extends('layouts.login')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN BIBIT JAGUNG TERBAIK MENGGUNAKAN METODE AHP</h3>
                <br>
                <div class="card col-md-12" style="background-color:#194d77;">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                    
                   <center>
                    <div class="card-body">
                        
                    <div class="row">
                            
                        <div class="col-md-12 ">
                            <div  >
                                <h1><i class="fa fa-user"></i></h1>
                            
                            </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Username">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <center>
                                    <div class="form-group row mb-0">
                                        
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-block">
                                                {{ __('Login') }}
                                            </button>

                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif --}}
                                        </div>
                                        
                                    </div>
                                    </center>
                                    <br>
                                    <br>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </center>

            </div>
        </div>
    </div>
@endsection
