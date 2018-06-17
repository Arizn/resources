
@extends('layouts.auth')

@section('title')
	{!! trans('titles.exceeded') !!}
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

			<div class="x_panel x_panel-danger">
					<div class="panel-heading">
						<h3 style=" color:#d9534f;">{!! trans('titles.exceeded') !!}</h3>
					</div>
				<div class="x_content">
				<hr style="border-top: 1px solid #d9534f;">
					<h4>
					{!! trans('auth.tooManyEmails', ['email' => $email, 'hours' => 34]) !!}
					</h4>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection







