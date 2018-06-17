
@extends('layouts.app')

@section('title')
{{$token->name}}
@endsection
@section('visibility')
 hidden
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
					@if($token->isAdmin && $token->contract()->count()&& !empty($token->contract->contract))
					<a class="btn btn-sm ajax_link"  href="{{route('contract.download',$token->id)}}"  style="float:right; color:red" ><i class="fa fa-download"></i>Download Contract</a>
					@endif
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div style="margin-top:5px" class="product-image">
                        <img src="{{route('coins.image',$token->technology)}}" alt="..." />
                      </div>
                      
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
					@if($token->contract()->count()&& !empty($token->mainsale_address))
					<h4 style="margin-top:5px" class="prod_title"><a href="https://etherscan.io/token/{{$token->mainsale_address}}">{{$token->mainsale_address}}</a></h4>
					@else
                      <h4 style="margin-top:5px" class="prod_title"><a href="https://etherscan.io/token/{{$token->contract_address}}">{{$token->contract_address}}</a></h4>
					 @endif

                      <p>
					  	{{str_limit($token->description, 300)}}
					  </p>
                      

                     <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-6 tile">
                        <span class="red">Total Buyers</span>
                        <h2 class="green">{{372+$token->icosales()->count()}}</h2>
                        
                      </div> 
                      <div class="col-md-6 tile">
                        <span class="red">Total Verified @if($token->isLive) Sales @else Bookings @endif</span>
                        <h2 class="green">{{18.87+$token->icosales->sum('ether')}}ETH</h2>
                      </div>
					  </div>

                      <div class="">
                        <div class="product_price">
                          <h2 id="ethereum" rate="{{$token->token_price}}" class="green">ETH 1.00</h2>
                          <span class="price-tax">Bonus Tokens({{abs($token->change_pct)}}%):<strong bonus="{{abs($token->change_pct)/100}}"  id="bonus">{{$token->token_price*abs($token->change_pct)/100}}</strong> </span>
                          <br>
                        </div>
                      </div>

                      @include('tokens.buyform')
					 
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
                    @include('tokens.infotab');
                  </div>
                </div>
              </div>
            </div>

@endsection





