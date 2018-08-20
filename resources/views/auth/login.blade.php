@extends('layouts.app') @section('login')
<div class="container login">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-4">
            <div class="logo-login">
                <a href="/">
                    <img src="{{asset('/img/lance-black.svg')}}" alt="Lance" id="lnc-login">
                </a>
                <h4>ADMIN PANEL</h4>
            </div>
            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 col-lg-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email" name="email" value="{{ old('email') }}"
                            required autofocus> @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6 col-lg-12">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="wachtwoord" name="password"
                            required> @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 col-lg-12">
                        <button type="submit" class="btn-login">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection