<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME','icofury')}}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
		  	<li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
			@if(setting('enableDeploy','no')=='yes')
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'coins.deploy') ? 'active' : '' }}"  href="{{route('coins.deploy')}}">Deploy</a>
            </li>
			@endif
			<li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'coins.create') ? 'active' : '' }}" href="{{route('coins.create')}}">List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'list.tokens') ? 'active' : '' }}" href="{{route('list.tokens')}}">Token Market Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'list.icos') ? 'active' : '' }}" href="{{route('list.icos')}}">ICO List</a>
            </li>
			@if(setting('enableExchange','no')=='yes'&&  setting('membersOnlyExchange',1)==0 )
			 <li class="nav-item">
             <a class="nav-link {{ (\Request::route()->getName() == 'exchange') ? 'active' : '' }}"href="{{route('exchange')}}" >Swap shift</a>
            </li>
			@endif
        
			<li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'public.home') ? 'active' : '' }}" href="{{ route('public.home')}}">Wallets</a>
            </li>
			
			@if(setting('enableForum','no')=='yes')
			<li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'chatter.home') ? 'active' : '' }}" href="{{ route('chatter.home')}}">Forum</a>
            </li>
			@endif
			@if (Route::has('login'))
                    @if (Auth::check())
					
					 <li class="nav-item" ><a class="nav-link"  href="{{url('/logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                        
                    @else
					<li class="nav-item">
					  <a class="nav-link " href="{{ url('/login') }}">Login</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="{{ url('/register') }}">Register</a>
					</li>
                    @endif
           
            @endif
			
          </ul>
        </div>
      </div>
    </nav>