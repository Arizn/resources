
@extends('home.app')

@section('title')
{{$token->name}}
@endsection
@section('heading')
{{$token->name}} Market Information
@endsection

@section('content')
			<section style="padding: 2rem;"><div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
			  <h3 style="margin-top:5px"  class="prod_title"><a data-toggle="tooltip" title="View At Etherscan" target="_blank" href="https://etherscan.io/token/{{$token->contract_address}}">TOKEN CONTRACT ADDRESS : {{str_limit($token->contract_address, 42)}}</a></h3>
                <div class="x_panel">
                  
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <div style="margin-top:10px" class="product-image">
                        <script type="text/javascript">
						baseUrl = "https://widgets.cryptocompare.com/";
						var scripts = document.getElementsByTagName("script");
						var embedder = scripts[ scripts.length - 1 ];
						(function (){
						var appName = encodeURIComponent(window.location.hostname);
						if(appName==""){appName="local";}
						var s = document.createElement("script");
						s.type = "text/javascript";
						s.async = true;
						var theUrl = baseUrl+'serve/v1/coin/chart?fsym={{$token->symbol}}&tsym={{setting("siteCurrency")}}';
						s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
						embedder.parentNode.appendChild(s);
						})();
						</script>

                      </div>
                      
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      

                      <p>Powered by <a href="https://www.cryptocompare.com">https://www.cryptocompare.com</a></p>
					  
                      

                     <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-6 tile">
                        <span>Volume</span>
                        <h2>{{$country->symbol}}{{Number::short_format($token->volume,$country->decimal_digits)}}</h2>
                      </div>
                      <div class="col-md-6 tile">
                        <span>Market Capitalisation</span>
                        <h2>{{$country->symbol}}{{Number::short_format($token->market_cap, $country->decimal_digits)}}</h2>
                      </div>
					  </div>

                      <div class="">
                        <div class="product_price">
                          <h1 class="price">Price:{{$country->symbol}}{{number_format($token->price, $country->decimal_digits)}}</h1>
                          <span class="price-tax @if($token->change_pct > 0) green @else red @endif"> 24Hr Change {{number_format($token->change_pct,2)}}%</span>
                          <br>
                        </div>
                      </div>

                      <div class="">
						  <div style="padding-left:0px" class="col-md-6">
							  <a href="{{setting('affiliate_link')}}" class="btn btn-danger btn-lg">Buy Tokens</a>
						  </div>
						   <div class="col-md-6">
						   <a href="{{setting('affiliate_link')}}" class="btn btn-success btn-lg">Sell Tokens</a>
						  </div>
                        
                        
                      </div>
					 
				
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
					 <a href="{{route('coins.deploy')}}"> <img src="/images/pagead.jpg"/></a>
					  

                    </div>


                    <div class="col-md-12">

                      <div class=""  role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active">
						  	<a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Description</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Comments</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div style="font-size:14px" role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="home-tab">
                            {!! $token->description !!}
							{!! $token->features !!}
							{!! $token->technology !!}
                          </div>
                          <div role="tabpanel" class="tab-pane " id="tab_content2" aria-labelledby="profile-tab">
                            <div class="fb-comments" data-href="https://icofury.com/tokens/{{$token->symbol}}" data-numposts="10"></div>
                          </div>
                         
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div></section>

@endsection

@push('scripts')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=233621603488112';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@endpush



