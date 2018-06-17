<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{config('app.name')}}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="@if (auth()->user()->profile->avatar != NULL) {{ auth()->user()->profile->avatar }}@else /images/img.jpg @endif " alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{auth()->user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
		

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h2>&nbsp;</h2>
                <ul class="nav side-menu">
				
                    
					<li><a href="{{route('public.home')}}"><i class="fa fa-bank"></i> Token Wallets</a>
                    </li>
					@if(setting('APP_MODE','ICO')!='ICO')
					@if(setting('enableDeploy','no')=='yes')
					<li><a href="{{route('coins.deploy')}}"><i class="fa fa-cog"></i> Deploy Your Token</a>
                    </li>
					@endif
					<li><a href="{{route('coins.create')}}"><i class="fa fa-plus"></i> Add a Token </a>
                    </li>
					<li><a href="{{route('coins.index')}}"><i class="fa fa-info"></i> Token Market Info</a>
                    </li>
					<li><a href="{{route('coins.ico')}}"><i class="fa fa-shopping-cart"></i> ICO list</a>
                    </li>
					@if(setting('enableExchange','no')=='yes')
					
					<li><a href="{{route('exchange')}}"><i class="fa fa-exchange"></i>Swap shift  Exchange @if(env('DEMO',true))<span class="label label-danger pull-right">new</span>@endif</a>
                    </li>
					@endif
					@endif
					
                    <li><a><i class="fa fa-cogs"></i>Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('profile.show',Auth::user()->name)}}">View Account</a></li>
							<li><a href="{{route('profile.edit',Auth::user()->name)}}">Edit Account</a></li>
                            <li><a class="ajax_link authorize" href="{{route('backup')}}">Backup Private Key</a></li>
							 <li><a class="ajax_link authorize" href="{{route('accesstoken')}}">Download Api Key</a></li>
                        </ul>
                    </li>
					<li><a href="/"><i class="fa fa-home"></i>Go Home</a>
                    </li>
					
					
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        @include('partials._sidenav_footer')
    </div>
</div>