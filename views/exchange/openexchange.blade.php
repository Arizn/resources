@extends('layouts.auth')
@section('title','exchange')
@push('css')
<style>
	
	 .login_content form div ul.widget_profile_box li a {
		font-size: 22px;
    	margin: 0 0 0 0;
	 }
	 ul.widget_tally .month {
		width: 60%;
	 }
	 ul.widget_tally .count {
		width: 40%;
	}
	p.item{
		margin:0 0 0 0 ;
	}
	.widget_tally_box p, .widget_tally_box span {
		text-align: center;
	}
	.login_wrapper {
		margin: 1% auto 0;
		max-width: 800px;
	}
	.login_content form {
   	 	margin: 0px 0;
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
	ul.count2 li {
		width: 50%;
	}
	.widget {
		/*min-width:400px;*/
		max-width: 800px;
	}
	.img-circle.ex_img {
    width: 85%;
    background: #fff;
    margin-left: 0%;  
    z-index: 1000;
    position: inherit;
    margin-top: 0px; 
	margin-bottom: 2px;
    border: 1px solid rgba(52,73,94,.44);
    padding: 4px;
}
	</style>
@endpush
@section('content')

    <div id="login" class="animate form login_form">
          <section  class="login_content">
		  	<div  class="widget widget_tally_box">
			@include('exchange.exchanger')
			</div>
			<a href="{{url('/')}}" >{{env('APP_NAME')}}</a>
          </section>
        </div>
@endsection



