@extends('layouts.app')

@section('title')
	{{ $user->name }}'s Profile
@endsection

@push('css')

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

@endpush

@section('content')


<div class="row">
	
	
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Wallets</h2>
					&nbsp;<small style="line-height: 4;"><a class="blue tooltips" onClick="$('#add').slideToggle('slow')" data-original-title="Add A Token"  href="javascript:;">{{ trans('profile.showProfileTitle',['username' => $user->name]) }}</a></small>
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
				<div class="x_content">

    					<img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar">

						<dl class="user-info">

							<dt>
								{{ trans('profile.showProfileUsername') }}
							</dt>
							<dd>
								{{ $user->name }}
							</dd>

							<dt>
								{{ trans('profile.showProfileFirstName') }}
							</dt>
							<dd>
								{{ $user->first_name }}
							</dd>

							@if ($user->last_name)
								<dt>
									{{ trans('profile.showProfileLastName') }}
								</dt>
								<dd>
									{{ $user->last_name }}
								</dd>
							@endif

							<dt>
								{{ trans('profile.showProfileEmail') }}
							</dt>
							<dd>
								{{ $user->email }}
							</dd>

							@if ($user->profile)

								@if ($user->profile->theme_id)
									<dt>
										{{ trans('profile.showProfileTheme') }}
									</dt>
									<dd>
										{{ $currentTheme->name }}
									</dd>
								@endif

								@if ($user->profile->location)
									<dt>
										{{ trans('profile.showProfileLocation') }}
									</dt>
									<dd>
										{{ $user->profile->location }} <br />
										Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />

										<div id="map-canvas"></div>

									</dd>
								@endif

								@if ($user->profile->bio)
									<dt>
										{{ trans('profile.showProfileBio') }}
									</dt>
									<dd>
										{{ $user->profile->bio }}
									</dd>
								@endif

								@if ($user->profile->twitter_username)
									<dt>
										{{ trans('profile.showProfileTwitterUsername') }}
									</dt>
									<dd>
										{!! HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')) !!}
									</dd>
								@endif

								@if ($user->profile->github_username)
									<dt>
										{{ trans('profile.showProfileGitHubUsername') }}
									</dt>
									<dd>
										{!! HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')) !!}
									</dd>
								@endif
							@endif

						</dl>

						@if ($user->profile)
							@if (Auth::user()->id == $user->id)

								{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

							@endif
						@else

							<p>{{ trans('profile.noProfileYet') }}</p>
							{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}

						@endif

					</div>
			
			
		</div>
		</div>
</div>
@endsection

@push('js')

	@include('scripts.google-maps-geocode-and-map')

@endpush




