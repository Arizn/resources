<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Recieve Coins</h2>
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
					<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
				</ul>
					<div class="clearfix"></div>
				</div>
			<div style="height:315px" class="x_content">
					<div class="scrollbar" data-height="300px">
					<ul class="list-unstyled top_profiles scroll-view">
						@foreach($bitwallets as $ft)
						<li class="media event"> <img style="padding: 6px 6px;" class="pull-left border-aero profile_thumb" src="{{route('coins.image',$ft->token->logo)}}"/>
							<div class="media-body"> 
							<p>&nbsp;</p><a class="title" href="{{route('coins.show',$ft->token->symbol)}}">{{$ft->token->name}} : <strong>BAL {{number_format($ft->balance,6,'.', '')}}</strong></a>
								
								<p>
								<i data-img="{{route('qrcode',$ft->freeAddress)}}" class="fa fa-qrcode qr"></i>&nbsp;&nbsp; <a href="{{route('coins.show',$ft->token->symbol)}}" class="btn btn-xs btn-success"><i class="fa fa-shopping-cart"></i>  Market info</a> </p>
								
							</div>
							<p data-copythis="{{$ft->freeAddress}}" style="cursor:pointer" data-toggle="tooltip" title="click to copy" class="copy2"> {{$ft->freeAddress}} </p>
						</li>
						@endforeach
							
						</ul>
				</div>
				</div>
		</div>
		</div>
		
	@push('scripts')
	<script>
	$(document).ready(function(e) {
		$('.qr').popover({
			html: true,
			trigger: 'hover',
			content: function () {
				return '<img src="'+$(this).data('img') + '" />';
			}
		});

		$('.copy2').click(function() {
				$('[data-toggle="tooltip"]').tooltip("hide");
				clipboard.writeText($(this).data('copythis'));
				$(this).notify('copied',{
					className:'success',
					position:'bottom',
					autoHideDelay: 1500,
					showAnimation: 'fadeIn',
					hideAnimation: 'fadeOut'
					
				});
			});
	});

</script>

@endpush