<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Hotest ICO</h2>
					&nbsp;<small style="line-height: 4;"><a class="green" href="{{route('coins.ico')}}">See all</a></small>
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a> </li>
							<li><a href="#">Settings 2</a> </li>
						</ul>
						</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
				</ul>
					<div class="clearfix"></div>
				</div>
			<div style="height:315px" class="x_content">
					<div class="scrollbar" data-height="300px">
					<ul class="list-unstyled top_profiles scroll-view">
						@foreach($featured as $ft)
						<li class="media event"> <img style="padding: 6px 6px;" class="pull-left border-aero profile_thumb" src="{{route('coins.image',$ft->logo)}}"/>
							<div class="media-body"> <a class="title" href="{{route('coins.show',$ft->symbol)}}">{{$ft->name}} : <strong>ETH {{number_format($ft->price,6,'.', '')}}</strong></a>
								<p> Instant Sale. {{$ft->change_pct}}% bonus </p>
								<p> <small>{{$ft->icosales()->count()}}  Sales Total</small> <a href="{{route('coins.show',$ft->symbol)}}" class="btn btn-xs btn-success"><i class="fa fa-shopping-cart"></i> Buy Now</a> </p>
							</div>
						</li>
						@endforeach
							
						</ul>
				</div>
				</div>
		</div>
		</div>
		
		