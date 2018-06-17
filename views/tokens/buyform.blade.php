<div class="">
					  @if($token->isLive)
					
					      @if($token->isBuyable )
						  <div style="padding-left:0px" class="col-md-7">
							<input id="amount" value="{{$token->token_price}}"  type="text" placeholder="No of Tokens"  class="input-lg form-control"/>
						  </div>
						  <div class="col-md-5">
						  	<a href="{{route('wallets.buy')}}"  data-amount="1" data-token_id="{{$token->id}}" title="Buy with Wallet"  id="6r6rrc6ui" class="ajax_link btn btn-danger authorize btn-lg usewallet">BUY</a>
							<a data-amount="1" href="{{route('wallets.metamask')}}" style="cursor:pointer;" data-to="{{$token->mainsale_address?$token->mainsale_address:$token->contract_address}}" data-chainid="{{$token->chainId}}"  class="buynow metamask" ><img  style="cursor:pointer;" width="35px" data-toggle="tooltip" title="Buy With Metamask" src="{{route('coins.image','metamask.png')}}"></a> 
						  </div>
						  @elseif($token->contract()->count()&&!empty($token->contract->buy_tokens_function))
						  <form action="{{route('wallets.buy')}}" method="post" class="authorize ajax_form">
						  {{csrf_field()}}
								<div style="padding-left:0px" class="col-md-7">
									{!!$token->buyFunctionInputs!!}
								</div>
								<div class="col-md-5">
									<input type="hidden" name="amount" id="eth" value=""/>
									<input type="hidden" name="password" id="password" value=""/>
									<input type="hidden" name="token_id" id="tkid" value="{{$token->id}}"/>
									<input type="submit" value="BUY NOW" name="BUY" class="btn btn-success"/>
								</div>
						  </form>
 						  @endif
						@endif
                       </div>