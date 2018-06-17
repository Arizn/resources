
		
			  <div style="" class="widget widget_tally_box">
			  
				<div class="x_panel">
				<a data-toggle="tooltip" title="Your Order Reference" href="{{route('order',$order->reference)}}"><h3 >{{$order->reference}}</h3></a>
				  <div class="x_content">
					<strong>You are paying</strong>
					 @if(!$siteOrder))
					 <h4 >{{$order->user->profile->location}}</h4>  
					 @endif
					
					<div class="flex">
					  <ul class="list-inline count2">
						
						<li style="float:left">
						  <h3>{{$order->amount+$order->fees}}</h3>
						  <span>{{$order->token->name.' '.$order->token->symbol}}</span>
						</li>
						
						<li style="float:right">
						  <h3>{{number_format(($order->amount+$order->fees) * $order->token->price , 2)}}</h3>
						  <span>{{setting('siteCurrency')}}</span>
						</li>
					  </ul>
					</div>
					<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
					@if($order->status ="CONFIRMING"||$order->status ="COMPLETE")
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <h4 class="panel-title green"><i class="fa fa-check"> </i> &nbsp;&nbsp; &nbsp; PAYMENT RECIEVED</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
						  @foreach($order->transactions->where('type','credit') as $tx)
						   <p style="font-size:10px">{{$tx->tx_hash}}</p>
						   <p class="green" style="font-size:20px">{{$tx->token->symbol}} {{$tx->amount}}</p>
						    <p class="green" style="font-size:20px">CONFIRMATIONS: {{$tx->confirmations}}</p>
						   <p >TO ADDRESS: <a data-toggle="tooltip" title="click to copy"  style="font-size:16px" href="javascript:void(0)" data-copythis="{{$order->address}}" class=" copy2 green">{{$order->address}}</a>
						   </p>
                          @endforeach
                          </div>
                        </div>
                      </div>
					  @endif
					  @if($order->counter()->count()&&$order->counter->status == "COMPLETE" )
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title green"><i class="fa fa-check"> </i> &nbsp;&nbsp; &nbsp;  YOUR ORDER IS DELIVERED</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
						  <p style="font-size:20px"></p>
						   @foreach($order->counter->transactions->where('type','debit') as $tx)
						   <p style="font-size:12px">{{$tx->tx_hash_link}}</p>
						   <p class="green" style="font-size:20px">{{$tx->token->symbol}} {{$tx->amount}}</p>
						    
						   <p >Destination: <a data-toggle="tooltip" title="click to copy"  style="font-size:16px" href="javascript:void(0)" data-copythis="{{$tx->to_address}}" class=" copy2 green">{{$tx->to_address}}</a>
						   </p>
                          @endforeach
						  
						
                           
                          </div>
                        </div>
                      </div>
					  @endif
                      
                    </div>
				  </div>
				</div>
			  </div>   
              <div>  
              </div>

              <div class="clearfix"></div>
			  @if($timer)
	Valid for the next <span id="minutes"></span> minutes and <span id="seconds"></span> seconds.
			 @endif


              <div class="separator">
			    <a  class="" href="index.html"><i class="fa fa-chevron-circle-left"></i> &nbsp;&nbsp;Cancel and return to merchant</a>
                
				 {{csrf_field()}}
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>{{config('app.name')}}</h1>
                  <p>©{{date('Y')}} {{setting('siteslogan','Number One Cryptocurrency Payment gateway')}}</p>
                </div>
              </div>
           