@extends('layouts.auth')
@section('title','Payment')
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
		max-width: 500px;
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
		min-width: 500px;
		max-width: 500px;
	}
	</style>
@endpush
@section('content')
	@if(!$order->isPaid)
    <div id="login" class="animate form login_form">
          <section  class="login_content">
            {!!$form!!}
          </section>
        </div>
		<div id="expired" style="display:none;" class="animate form">
          <section class="login_content">
		  
		  	
			<div style="max-width: 400px;" class="widget widget_tally_box">
				<div class="x_panel">
				  <div class="x_content">
					
					 <strong>Time exceeded</strong>
					 <h4 class="red">TRANSACTION EXPIRED</h4>
					 
					 <div class="separator">
						<p> We couldnt detect a transaction in time. Return to the merchant and restart the transaction </p> <a  class="" href="index.html"><i class="fa fa-chevron-circle-left"></i> &nbsp;&nbsp;Cancel and return to merchant</a>
						
						 
						<div class="clearfix"></div>
						<br />
		
						<div>
						  <h1><i class="fa fa-paw"></i>{{config('app.name')}}</h1>
						  <p>©{{date('Y')}} {{setting('siteslogan','Number One Cryptocurrency Payment gateway')}}</p>
						</div>
					  </div>
					 
					
				  </div>
				</div>
			  </div>
			
          </section>
        </div>
		<div id="statusdiv" style="display:none" class="animate form login_form">
          <section id="status" class="login_content">
          
          </section>
        </div>
		
		
		
		@else
		<div id="register" class="animate form registration_form">
          <section class="login_content">
          
          </section>
        </div>
		@endif
@endsection
@push('scripts')
<script type="text/javascript">
var status = '{{$status}}';
var remainingTime = {{$remainingTime}};
var mins = Math.floor((remainingTime)/60);
var secs = Math.floor(remainingTime);
function countdown() {
	setTimeout('Decrement()',1000);
}
function Decrement() {
	if (document.getElementById) {
		if(secs <= 0 ){
			
			$("#login").hide();
			$("#expired").show();
			return;
		}
		minutes = $("#minutes");
		seconds = $("#seconds");
		if (seconds < 59) {
			seconds.text(secs);
		} else {
			minutes.text(getminutes());
			seconds.text(getseconds());
		}
		secs--;
		setTimeout('Decrement()',1000);
	}
}
function getminutes() {
	// minutes is seconds divided by 60, rounded down
	mins = Math.floor(secs / 60);
	return mins;
}
function getseconds() {
	// take mins remaining (as seconds) away from total seconds remaining
	return secs-Math.round(mins *60);
}
@if($timer)
countdown();
@endif
var endPoll = false;
var makepoll = function(){
	 poll();
	 if(!endPoll){
		setTimeout(function() {
		makepoll()	
		}, 30000);
	 }
}
var poll = function(){
	$.post( "{{route('order.status',$order->reference)}}", function( data ) {
		console.log(data);
	  if(data.status =='EXPIRED'){
		  secs = 0;
		  $('.ui').hide()
		  $("#login").hide();
		  $("#expired").show();
		  return true;
	  }
	  if(data.status =='UNPAID'){
		  $("#login").show();
		  $("#expired").hide();
		  return true;
	  }
	  if(data.status =='CONFIRMING'||data.status =='COMPLETENOCOUNT'||data.status =='COMPLETE'||data.status =='PROCESSING'||data.status =='DELIVERED'){
		  if(data.status =='COMPLETENOCOUNT'||data.status =="DELIVERED")
		  endPoll = true;
		  if(status != data.status ){
			  location.reload(true);
				/*status = data.status;
				$("#login").hide();
				$("#expired").hide();
				$("#status").html(data.html);
				$("#statusdiv").show();
				$('.collapse').collapse();
				//swal('Order Updated',data.message,'success');
				*/
				
		  }
		  
		 
		  return true
	  }
	});
}


$(document).ready(function(e) {
	
	
	$('body').on('click', '[data-toggle="collapse"]', function () {
		var collapsedId = $(this).attr('href');
		$(collapsedId).collapse('toggle');
	})
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		}
	});
	@if($update)
	makepoll();
	@endif
	$('.copy2').click(function() {
			$('[data-toggle="tooltip"]').tooltip("hide");
			clipboard.writeText($(this).data('copythis'));
			$(this).notify('copied',{
				className:'success',
				position:'right',
				autoHideDelay: 1500,
				showAnimation: 'fadeIn',
				hideAnimation: 'fadeOut'
				
			});
		});
	
	
});
</script>
@endpush
