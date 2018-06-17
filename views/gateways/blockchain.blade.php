<form class="ajax_form" method="post" id="paymentform"  action="{{route('order.pay')}}">
			{{csrf_field()}}
			  <div style="" class="widget widget_tally_box">
			  
				<div class="x_panel">
				<a data-toggle="tooltip" title="Your Order Reference" href="{{route('order',$order->reference)}}"><h3 class="green">{{$order->reference}}</h3></a>
				  <div class="x_content">
					<strong>You are paying</strong>
					 @if(!$siteOrder))
					 <h4 class="green">{{$order->user->profile->location}}</h4> 
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
					@if($items->count()>1)
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <h4 class="panel-title">TOTAL ITEMS: {{$items->count()}}</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
						   <ul class="list-inline widget_tally">
					 @foreach($items as $i => $item)
                                <li>
                                  <p class="item">
                                    <span class="month">0{{$i + 1}} &nbsp;&nbsp;{{$item['name']}}</span>
                                    <span class="count">{{$item['price']}} {{$order->token->symbol}}</span>
                                  </p>
                                </li>
					 @endforeach
					  
                                <li>
                                  <p>
                                    <span class="month"><strong>Total: ({{$items->count()}} Items)</strong> </span>
                                    <span class="count">{{$order->amount}} {{$order->token->symbol}} </span>
                                  </p>
                                </li>
                              </ul>
                            
                          </div>
                        </div>
                      </div>
					  @endif
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Payment Address</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                          <div class="panel-body">
						  <p style="font-size:12px"> Send {{$order->amount+$order->fees.$order->token->symbol}}  to the Address Below
                            </p>
                            <p ><a data-toggle="tooltip" title="click to copy"  style="font-size:16px" href="javascript:void(0)" data-copythis="{{$order->address}}" class=" copy2 green">{{$order->address}}</a>
                            </p>
                            <img src="{{route('qrcode',$order->address.'?amount='.$order->amount)}}" />
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Pay with Wallet</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                          <div class="panel-body">
                            <p><strong>@if(auth()->check()) Password @else Login to Pay @endif</strong>
                            </p>
							<div>
								<input name="email" type="@if(auth()->check()){{'hidden'}}@else{{'text'}}@endif" class="form-control" placeholder="Login Email" value="@if(auth()->check()){{auth()->user()->email}}@endif"  required="" />
								
							  </div>
							  <div>
								<input name="password"  type="password" class="form-control" placeholder="Enter Your Login Password" required="" />
								<input type="hidden" name="order_id" value="{{$order->id}}"/>
								<button type="submit" class="btn btn-success submit">Complete Payment &nbsp;&nbsp; <i class="fa fa-check"></i></button>
							  </div>

                          </div>
                        </div>
                      </div>
                    </div>
				
					
					
					
				  </div>
				</div>
			  </div>
			  
            
              <div>
              
				
              
              </div>

              <div class="clearfix"></div>
			  
	Valid for the next <span id="minutes"></span> minutes and <span id="seconds"></span> seconds.


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
            </form>