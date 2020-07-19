@extends('layouts.app')

@section('content')
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-heading bg-img">
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Admin</strong> </h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Enter Email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control input-lg @error('password')
                                is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input class="form-check-input" type="checkbox" name="remember" id="checkbox-signup" id="remember" {{ old
                            ('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}><i class="fa fa-lock m-r-5"></i> Forgot your
                                password?</a>
                            @endif
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="register.html">Create an account</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection


