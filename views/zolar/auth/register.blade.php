@extends('layouts.auth')
@section('title','Login')
@section('content')
    <div class="animate form login_form">
        <section class="login_content" style="padding-top:0">
             {!! Form::open(['route' => 'register', 'class'=>'ajax_form', 'role' => 'form', 'method' => 'POST'] ) !!}
                {{csrf_field()}}
                <h1>Create Account</h1>
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username', 'id' => 'name', 'required', 'autofocus']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'first_name']) !!}
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'id' => 'last_name']) !!}
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail Address', 'required']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'required']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm', 'placeholder' => 'Confirm Password', 'required']) !!}
                            </div>
                        </div>
                        @if(config('settings.reCaptchStatus'))
                            <div class="form-group">
                                <div style="padding-bottom:10px;" class="col-sm-12">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group margin-bottom-2">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    Register For A New Account
                                </button>
                            </div>
                        </div>

                        

                    {!! Form::close() !!}

                <!--div class="clearfix"></div>
				 
				  <p class="text-center margin-bottom-2">
                            Or Use Social Logins to Register
                        </p-->

                       {{-- @include('partials.socials')--}}
				
				
 			<div class="clearfix"></div>
               <div class="separator">
                    <p class="change_link">Already Have an Account?
                        <a href="{{route('login')}}" class="to_register"> Sign In </a>
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
@push('scripts')
     <script src='https://www.google.com/recaptcha/api.js'></script>
 @endpush
