

@push('css')
<style>
.actionBar .buttonDisabled {
   display:none;
}
.cc-selector input {
	margin: 0;
	padding: 0;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
.cc-selector-2 input {
	position: absolute;
	z-index: 999;
}
 
@foreach($rates->unique(function($item){return $item->src_gateway.$item->fromsym;}) as $y=> $rate )
@if(!empty($rate->src()->count()))
	@foreach ( $rate->src->gateways as $gate)
	@if($gate['name']!=$rate->src_gateway)@continue @endif
 {{'.img-'.$gate['name']}}{
	background-image:url("{{route('home.coins.image',$gate['logo'] )}}");
}
@endforeach
@endif
@if(!empty($rate->dst()->count()))
@foreach ( $rate->dst->gateways as $gate)
@if($gate['name']!=$rate->dst_gateway)@continue @endif
 {{'.img-'.$gate['name']}}{
	background-image:url("{{route('home.coins.image',$gate['logo'])}}");
}
@endforeach
@endif
@endforeach

.cc-selector-2 input:active +.gateway-cc, .cc-selector input:active +.gateway-cc {
 opacity: .9;
}
.cc-selector-2 input:checked +.gateway-cc, .cc-selector input:checked +.gateway-cc {
	-webkit-filter: none;
	-moz-filter: none;
	filter: none;
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
.gateway-cc {
	cursor: pointer;
	background-size: contain;
	border: 1px solid red;
	border-radius: 50px;
	background-repeat: no-repeat;
	display: inline-block;
	width: 70px;
	height: 70px;
	-webkit-transition: all 100ms ease-in;
	-moz-transition: all 100ms ease-in;
	transition: all 100ms ease-in;
	-webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
	-moz-filter: brightness(1.8) grayscale(1) opacity(.7);
	filter: brightness(1.8) grayscale(1) opacity(.7);
}
.card {
	display: none;
}
.gw {
	border: 1px solid red;
	border-radius: 50px;
	width: 71px;
	height: 71px;
	display: inline-block;
}
.gateway-cc:hover {
	-webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
	-moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
	filter: brightness(1.2) grayscale(.5) opacity(.9);
}

.wallets .dataTables_scroll{
	max-height: 240px;
}

.wizard_verticle ul.wizard_steps li a .step_no {
    width: 95px;
    height: 95px;
    line-height: 95px;
    border-radius: 95px;
    display: block;
    margin: 0 auto 5px;
    font-size: 20px;
    text-align: center;
    position: relative;
    z-index: 5;
}

@media (max-width: 767px){
	.wizard_verticle .stepContainer{
        width: 100%
	}
}

</style>
@endpush



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<form id="exchangeform" action="{{route('exchange.initiate')}}" class="ajax_form form-horizontal form-label-left">  
			<input name="rate_id" id="rate_id" type="hidden">
			{{csrf_field()}}
				<div class="x_content">
					<h2> Swapshift Instant Exchange</h2>
					<!-- Tabs -->
					<div id="exchangeapp" class="form_wizard wizard_verticle exchangeapp">
						<ul class="list-unstyled wizard_steps hidden-xs">
							<li> <a href="#step-11"> <span class="step_no"> <img  id="src_img" src="images/img.jpg" alt="..." class="img-circle ex_img src_image"> </span> </a> </li>
							<li> <a href="#step-22"> <span class="step_no"><img id="src_img" src="images/img.jpg" alt="..." class="img-circle ex_img dst_image"></span> </a> </li>
							<li> <a href="#step-33"> <span class="step_no"><i style=" padding-top:25px; font-size:40px" class="fa fa-exchange"></i></span> </a> </li>
							<li> <a href="#step-44"> <span class="step_no"><i style="font-size:80px" class="fa fa-check-circle"></i></span> </a> </li>
						</ul>
						<div id="step-11">
							<div class="steps"><h2 class="StepTitle"></h2>
							<span class="section">
							<h1>Deposit <span class="src_symbol"></span></h1>
							</span><br>
							<div class="row">
								<div class="col-md-12 cc-selector-2"> 
								
						{!! implode('',$srcgates) !!}
								</div>
							</div></div>
						</div>
						
						<div id="step-22">
							<div class="steps"><h2 class="StepTitle"></h2>
							<span class="section">
							<h1>Deposit <span class="src_symbol"></span>&nbsp;&nbsp;<i class="fa fa-exchange"></i> &nbsp;&nbsp;Recieve <span class="dst_symbol"></span></h1>
							</span><br>
							<div class="row">
								<div class=" col-md-12 cc-selector-2"> 
								
								
								{!!implode('',$dstgates)!!}
								
								
								
								
								
								</div>
							</div></div>
						</div>
						<div id="step-33">
							
							
						<div class="steps">	<ul style="padding-top:10px" class="stats-overview">
								<li>
								  <span class="name"><span class="dst_symbol"></span> Supply </span>
								  <span class="value text-success dst_supply"> 2300 </span>
								</li>
								<li>
								  <span class="name"><span class="dst_symbol"></span> Mkt Cap</span>
								  <span class="value text-success dst_marketcap"> 2000 </span>
								</li>
								<li class="hidden-phone">
								  <span class="name"><span class="dst_symbol"></span> Price </span>
								  <span class="value text-success dst_price"> 20 </span>
								</li>
							</ul>
							<div class="row">
                      <div class=" text-center">

                      <div style=" padding-bottom:10px" class="col-md-6 col-sm-6 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h3 class="brief text-danger"> <span class="src_amount">0.0000</span> </h3>
                            <div class="left col-xs-7">
                              <h2><span class="src_symbol"></span></h2>
                              
                              <ul class="list-unstyled">
                                <li><i class="fa fa-arrow-down"></i>Min:<span class="min">0.0000788</span> </li>
                                <li><i class="fa fa-arrow-up"></i> Max:<span class="max">4.6790800</span> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img   src="images/img.jpg" alt="" class="src_image img-circle ex_img img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
							<div style="padding:0 5px 0 5px"><input name="src_amt"  type="text" class="form-control verify" id="src_amt" disabled placeholder=""></div>
							<p><strong>Fees: </strong> <span class="fees">0.000</span><span class="src_symbol"></span></p>
                          </div>
                        </div>
						<input  type="text" name="src_account" id="src_account" class="form-control verify" placeholder="">
                      </div>

                      <div style=" padding-bottom:10px"  class="col-md-6 col-sm-12 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h3 class="brief text-danger"><span class="dst_amount">0.000</span></h3>
                            <div class="left col-xs-7">
                              <h2><span class="dst_symbol"></span></h2>
                              
                              <ul class="list-unstyled">
                                <li><i class="fa fa-arrow-down"></i>Rsv:<span class="max">0.00000000</span><span class="dst_symbol">SELECT</span></li>
                                <li><i class="fa fa-arrow-up"></i>Last:8min Ago</li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/img.jpg" alt="" class="dst_image ex_img img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            
							<div style="padding:0 5px 0 5px"><input disabled="true" name="dst_amt"  type="text" id="dst_amt" class="form-control verify" placeholder=""></div>
							<p class="green"><strong>Rate: </strong> 1<span class="src_symbol"> SELECT </span>:<span class="rate">0.0000</span><span class="dst_symbol"> SELECT</span> </p>
                          </div>
                        </div>
						<input  name="dst_account" id="dst_account" type="text" disabled="true" class="form-control verify" placeholder="Select a destination">
                      </div>
					  </div>
                    </div>
					
					<div style="padding-top:10px" class="col-md-6 col-xs-12"></div></div>
			
						</div>
						<div id="step-44">
							<div class="steps"><h2 class="StepTitle">Confirm Transaction</h2>
					
							<div class="row tile_count">
								<div class="col-md-6 col-sm-12 col-xs-12 tile_stats_count">
								  <span class="count_top"><i class="fa fa-user"></i> YOU SEND</span>
								  <div class="count send"></div>
								  <span class="count_bottom"><i class="green">FEES </i><span class="fees">0.09867</span></span>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 tile_stats_count">
								  <span class="count_top"><i class="fa fa-clock-o"></i> RECIEVE</span>
								  <div class="count recieve"></div>
								  <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Rate</i> <span class="rate">6</span></span>
								</div>
								
							  </div>
							  
							  <h3 class="StepTitle">Recieve <span class="dst_amount"></span> <span class="dst_symbol"></span> to: <br><span class="green dst_account"></span></h3>
							  <h3 class="StepTitle reverse"> Reverse <span class="src_amount"></span>  <span class="src_symbol"></span> to: <br> <span class="green src_account"></span></h3>
							  
							  <div style="padding-top:30px" class="col-md-6 col-xs-12"></div>
							</div>
						</div>
					</div>
					<!-- End SmartWizard Content --> 
				</div>
			</form>
		</div>
	</div>
</div>




@push('scripts') 
<script>
var rates = {!!json_encode($rates->groupBy('pair_id'))!!};
var exchanger = false;
var exchange;
var endPoll = false;
var makePoll = function(){
	 poll();
	 if(!endPoll){
		setTimeout(function() {
		makePoll()	
		}, 30000);
	 }
}
var poll = function(){
	$.post( "{{route('exchange.rates')}}", function( data ){
		rates = data;
		if(exchanger){
			exchange('src');
		}
	 
	},'json');
}

$(document).ready(function(e) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}'
		}
	});
	makePoll();
	var siteCurrency = '{{setting('siteCurrency')}}';
	var src = null, dst = null;
	var disable =function(){
		$('.verify').attr('disabled','true');
	}
	var enable =function(){
		$('.verify').removeAttr('disabled');
	}
	$('.steps').show('slow');
	var wizzard = $('#exchangeapp').smartWizard({
			  transitionEffect: 'slide',
			  onLeaveStep:function(e, wiz) {
				  if(wiz.toStep == 1||wiz.toStep == 2||wiz.toStep == 3){
					  $('.buttonFinish').hide();
				  }else{
					  $('.buttonFinish').show();
				  }
				  if(wiz.fromStep == 1&&wiz.toStep == 2){
						src = $('form#exchangeform input[type=radio][name=source]:checked');
						if(src.length < 1){
							swal(
							  'Please Select A destination',
							  'Pick a destination Currency From the list',
							  'error'
							)
							disable()
							return false;
						}
					}
					
					if(wiz.toStep == 3){
						dst = $('form#exchangeform input[type=radio][name=destination]:checked');
						////console.log(wiz.toStep,dst.length);
						if(dst.length < 1) {
							swal(
							  'Please Select A destination',
							  'Pick a destination Currency From the list',
							  'error'
							)
							disable()
							return false;
						}

						enable();
					}
					if(wiz.toStep == 4){
						exchanger = true;
						if($('#dst_amt').val() =="") {
							$('#dst_amt').notify('This Value is Required',{className: 'error',elementPosition: 'top left'})
							return false;
						}
						if($('#src_amt').val() =="") {
							$('#src_amt').notify('This Value is Required',{className: 'error',elementPosition: 'top left'})
							return false;
						}
						if($('#dst_account').val() =="") {
							$('#dst_account').notify('This Value is Required',{className: 'error',elementPosition: 'top left'})
							return false;
						}
						if($('#src_account').val() =="") {
							$('#src_account').notify('This Value is Required',{className: 'error',elementPosition: 'top left'})
							return false;
						}
						$('.src_account').text($('#src_account').val());
						$('.dst_account').text($('#dst_account').val());
						exchange('src');
						
					}else{
						exchanger = false;
					}
					return true;
   			  }
	});
	
	

	
	
	$('input[type=radio][name=source]').change(function() {
		exchange('src');
    });
	
	$('input[type=radio][name=destination]').change(function() {
		exchange('dst');
    });
	

	$('.buttonNext').html('Next <i class="fa fa-chevron-right"></i>').addClass('btn btn-primary');
	$('.buttonPrevious').html('<i class="fa fa-chevron-left"></i> Back').addClass('btn btn-warning');
	$('.buttonFinish').html('<i class="fa fa-check"></i> Confirm and Swap').addClass('btn btn-success');
	
	$("#wizard_verticle");
	
	$('#dst_amt').keyup(function(e) {
		exchange('dst');
	});
	
	$('#src_amt').keyup(function(e) {
		exchange('src');
	});
	
	
	
	
	 exchange = function(type){
		src = $('form#exchangeform input[type=radio][name=source]:checked');
		dst = $('form#exchangeform input[type=radio][name=destination]:checked');
		//console.log('1');
		if(type == 'src'){
			//console.log('2');
			$('.src_symbol').text(src.data('symbol'));
			$('.src_image').attr('src',src.data('img'));
			$('.src_name').text(src.data('name'));
			var only = src.data('gate');
			$('.dests').hide();
			$('.'+only).show()
			
			if(typeof dst.val() === "undefined"){
				disable(); 
				return false;
			}
		}
	
	
		if(type == 'dst'){
			$('.dst_symbol').text(dst.data('symbol'));
			$('.dst_image').attr('src',dst.data('img'));
			$('.dst_name').text(dst.data('name'));
			if(typeof src.val() === "undefined"){
				disable(); 
				return false;
			}
		}
		//console.log('7');
		var mrate = rates[src.data('gate')+'_'+dst.data('gate')];
		if(typeof mrate === "undefined"||mrate.length == 0){
			//console.log('8');
			 disable(); 
			 return false;
		}
		rate = mrate[0];
		enable()
		$('#rate_id').val(rate.id);
		$('.min').text(rate.minimum);
		$('.max').text(rate.maximum);
		$('.rate').text(rate.rate);
		var place  = "Enter Your "+dst.data('symbol')+" Address";
		if(rate.dst_type == "\\App\\Models\\Country"){
			place = "Enter Your Email Address";
		}
		$('#dst_account').attr('placeholder', place);
		var dst_dec = 2;
		if(rate.dst_type == "\\App\\Models\\Token"){
			dst_dec = 8;
			$('.dst_price').text(rate.dst.price+siteCurrency);
			$('.dst_supply').text(rate.dst.supply+rate.dst.symbol);
			$('.dst_marketcap').text(rate.dst.market_cap+siteCurrency);
			$('#src_amt').attr
		}else{
			$('.dstdetails').hide();
		}
		
		var place = "Reverse To "+src.data('symbol')+" Address (Just In case)";
		
		var reversal = "Reverse ( In case of Failure ) <span class=\"src_amount\">"+$('#src_amt').val()+" </span>  <span class=\"src_symbol\">"+rate.fromsym+"</span> to: <br> <span class=\"green src_account\">"+$('#src_account').val()+"</span>";
		var src_dec = 8;
		if(rate.src_type == "\\App\\Models\\Country"){
			place = "Enter Your Email Address";
			reversal ="Your Contact Email <br> <span class=\"green src_account\">"+$('#src_account').val()+"</span>";
			src_dec = 2;
		}
		$('.reverse').html(reversal)
		$('#src_account').attr('placeholder',place);
		var src_amt = $('#src_amt').val();
		var dst_amt = $('#dst_amt').val();
		if(type =='src' && src_amt !=""){
			
			$('.src_amount').text(src_amt);
			dst_amt = src_amt*rate.rate;
			dst_amt =dst_amt.toFixed(dst_dec);
			$('#dst_amt').val(dst_amt);
			$('.dst_amount').text(dst_amt);
			$('.recieve').text(rate.dst.symbol+dst_amt);
			$('.send').text(rate.src.symbol+src_amt);
		}
		//console.log('11');
		if(type =='dst' && dst_amt !=""){
			//console.log('12');
			$('.dst_amount').text(dst_amt);
			src_amt = (dst_amt/rate.rate);
			src_amt = src_amt.toFixed(src_dec);
			$('#src_amt').val(src_amt);
			$('.src_amount').text(src_amt);
			$('.recieve').text(rate.dst.symbol+dst_amt);
			$('.send').text(rate.src.symbol+src_amt);
			
		}
		var feez = parseFloat(src_amt)*rate.fees/100;
			feez = feez.toFixed(src_dec);
			$('.fees').text(feez);
	}

	

});
    </script> 
@endpush