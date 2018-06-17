<div class="top_nav">
    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
			<a style="font-size:24px; font-weight:500; line-height:2.5">{!!auth()->user()->balance!!}</a>
			&nbsp;&nbsp;<a style="line-height:2.5">Rate : {{\App\Models\Token::symbol("ETH")->first()->countryRate}}</a>
			

            <ul style="width:25%" class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="@if (auth()->user()->profile->avatar != NULL) {{ auth()->user()->profile->avatar }}@else /images/img.jpg @endif " alt="">{{auth()->user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('profile.show',Auth::user()->name)}}">Profile</a></li>
                        <li><a href="{{route('profile.edit',Auth::user()->name)}}">Edit Account</a></li>
                        <li>
							<a href="{{route('mytokens')}}">
								<span class="badge bg-green pull-right">{{auth()->user()->coins()->count()}}</span>
								<span>My Tokens</span>
							</a>
						</li>
						<li>
							<a href="{{route('myicos')}}">
								<span class="badge bg-green pull-right">{{auth()->user()->coins()->byType('ico')->count()}}</span>
								<span>My ICOS</span>
							</a>
						</li>
						
                        <li><a href="{{url('/logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{auth()->user()->unreadNotifications()->count()}}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						@foreach(auth()->user()->unreadNotifications()->limit(10)->get() as $alert )
                        <li>
                            <a class="ajax_link" data-id="{{$alert->id}}" href="{{route('notification')}}" >
                                <span class="image"><img src="/images/img.jpg" alt="System" /></span>
                                <span>
                          <span>{{$alert->data['heading']}}</span>
                          <span class="time">{{$alert->created_at->diffForHumans()}}</span>
                        </span>
                                <span class="message">
                         
						 {{str_limit($alert->data['message'],80)}}
                        </span>
                            </a>
                        </li>
						@endforeach
                       
					    @if(auth()->user()->unreadNotifications()->count() == 0)
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>No Notifications Avaialable</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
					    @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>