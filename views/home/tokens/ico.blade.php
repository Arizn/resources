
@extends('home.app')

@section('title')
{{$token->name}}
@endsection
@section('heading')
{{$token->name}}
@endsection

@section('content')
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="https://etherscan.io/token/{{$token->contract_address}}">{{$token->name}} Initial Coin Offering</a></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div style="margin-top:5px" class="product-image">
                        <img style="max-height: 450px" src="{{route('home.coins.image',$token->technology)}}" alt="..." />
                      </div>
                      
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h4 style="margin-top:5px" class="prod_title"><a href="https://etherscan.io/token/{{$token->contract_address}}">{{$token->contract_address}}</a></h4>
					 

                      <p>
					  	{!!str_limit($token->description, 300)!!}
					  </p>
                      

                     <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-6 tile">
                        <span class="red">Total Buyers</span>
                        <h2 class="green">{{651+$token->orders->count()}}</h2>
                        
                      </div>
                      <div class="col-md-6 tile">
                        <span class="red">Total Verified @if($token->isLive) Sales @else Bookings @endif</span>
                        <h2 class="green">{{67.9876+$token->orders->sum('amount')}} ETH</h2>
                      </div>
					  </div>

                      <div class="">
                        <div class="product_price">
                          <h2 id="ethereum" rate="{{$token->price}}" class="green">RATE: &nbsp;&nbsp;{{$token->symbol}} {{(int)$token->price}} / 1 ETH</h2>
                          <span class="price-tax">Bonus Tokens({{abs($token->change_pct)}}%):<strong bonus="{{abs($token->change_pct)/100}}"  id="bonus">{{$token->price*abs($token->change_pct)/100}}</strong> </span>
                          <br>
                        </div>
                      </div>

                      <div class="">
					  	
						  <div style="padding-left:0px" class="col-md-7">
						  
							<input id="amount" disabled  type="text" placeholder="Please Login to BUY"  class="input-lg form-control"/>
						  </div>
						   <div class="col-md-5">
						   <a title="Buy with Wallet"data-toggle="tooltip" href="{{route('coins.show',$token->symbol)}}" class="btn btn-danger btn-lg">LOGIN TO BUY</a>
						    @if($token->isLive && $token->isBuyable)<a data-amount="1" data-to="{{$token->contract_address}}" data-chainid="{{$token->chainId}}" class="buynow metamask" ><img width="35px" data-toggle="tooltip" title="Buy With Metamask" src="{{route('home.coins.image','metamask.png')}}"></a> @endif
						  </div>
                        
                        
                      </div>
					 
					 <hr>
					  
                      <div style="padding-top:5px" class="product_social">
                        <ul class="list-inline">
                          <!--li><a href="#"><i class="fa fa-twitter-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-rss-square"></i></a>
                          </li-->
						   <li style="vertical-align:sub">
						 <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Ficofury.com%2Ficos%2Fekashcoin&width=185&layout=button_count&action=recommend&size=large&show_faces=true&share=true&height=46&appId=233621603488112" width="185" height="30" style="border:none;overflow:hidden" p scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                          </li>
                        </ul>
                      </div>

                    </div>


                    <div class="col-md-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#details" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                          </li>
						 
                          <li role="presentation" class=""><a href="#comments" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Comments</a>
                          </li>
						 
						  
						  
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="details" aria-labelledby="home-tab">
                            <p>{{$token->description}}</p>
							<p>{{$token->features}}</p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="comments" aria-labelledby="profile-tab">
						   <div class="fb-comments" data-href="https://icofury.com/tokens/{{$token->symbol}}" data-numposts="10"></div>
                          </div>
						    
                          <div role="tabpanel" class="tab-pane fade" id="contract" aria-labelledby="profile-tab">
						  
                           </div>
						 
						 
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
@push('js')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=233621603488112';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endpush



