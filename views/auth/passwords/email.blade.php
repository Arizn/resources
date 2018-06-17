@extends('layouts.auth')

@section('title')
	{!! trans('titles.exceeded') !!}
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3>{!! trans('titles.exceeded') !!}</h3>
					</div>
					<div class="panel-body">
						<h6>
							{!! trans('auth.tooManyEmails', ['email' => 'ofut', 'hours' => 19]) !!}
						</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection