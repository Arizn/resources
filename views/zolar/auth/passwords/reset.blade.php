@extends('layouts.auth')

@section('content')

<div class="animate form login_form">
        <section class="login_content">
            
			<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
				{{ csrf_field() }}
				<h1>Reset Password</h1>
				<input type="hidden" name="token" value="{{ $token }}">

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					

					<div class="col-md-12">
						<input placeholder="E-Mail Address" id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

					<div class="col-md-12">
						<input placeholder="New Password" id="password" type="password" class="form-control" name="password" required>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					
					<div class="col-md-12">
						<input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12 ">
						<button type="submit" class="btn btn-primary">
							Reset Your Acccount Password
						</button>
					</div>
				</div>
			</form>
        </section>
    </div>



@endsection
