
@extends('layouts.auth')

@section('title')
	{{ Lang::get('titles.activation') }}
@endsection
@push('css')
<style>
	
	
	p.item{
		margin:0 0 0 0 ;
	}
	.widget_tally_box p, .widget_tally_box span {
		text-align: center;
	}
	
	
	.login_content a:hover {
		text-decoration: none;
	}
	.login_content h1:after, .login_content h1:before {
		 width: 0px;
	}
	.login_content form div a.panel-heading {
		font-size: 12px;
		margin: 0 0 0 0;
	}
	
	
	</style>
@endpush

@section('content')
<div class="animate form login_form">
	<section class="login_content">
	
	
		<div  style="max-width: 400px;" class="widget widget_tally_box">
		<h4>{{ Lang::get('titles.activation') }}</h4>
			<div class="x_panel">
				<div class="x_content">
					<p>{{ Lang::get('auth.regThanks') }}</p>
					<p>{{ Lang::get('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
					<p>{{ Lang::get('auth.clickInEmail') }}</p>
					<p align="center"><a href='/activation' class="btn btn-primary">{{ Lang::get('auth.clickHereResend') }}</a></p>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection



