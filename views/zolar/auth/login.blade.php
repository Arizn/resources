@extends('layouts.auth')
@section('title','Login')
@section('content')

    <div class="animate form login_form">
        <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{csrf_field()}}
                <h1>Login</h1>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" placeholder="email" required="" />
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div>
                    <button class="btn btn-default submit" type="submit">Log in</button>
					
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                               
                    <a class="reset_pass" href="{{route('password.request') }}">Forgot Pass?</a>
                </div>

                <div class="clearfix"></div>
				<!--div class="separator">
				{{--@include('partials.socials-icons')--}}
				</div-->
                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{route('register')}}" class="to_register"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-plus-circle"></i> {{config('app.name')}}</h1>
                        <p>©{{date('Y')}} </p>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
