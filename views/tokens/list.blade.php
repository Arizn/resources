
@extends('layouts.app')

@section('title')
 TMarket Capitalisation
@endsection
@section('visibility')
 hidden
@endsection


@section('content')
<div class="row tile_count">
	
	@foreach($tokens as $token)
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count"> 
		<span class="count_top">
			<i class="fa fa-plus"></i> {{$token->name}}
		</span>
		<div style="font-size:36px" class="count  @if($token->change_pct > 10) green @endif">{{number_format($token->price,2,'.', '')}}</div>
		<span class="count_bottom">
			<i class="@if($token->change_pct > 0) green @else red @endif">
				<i class="fa @if($token->change_pct > 0) fa-sort-asc @else fa-sort-desc @endif"></i>
				{{$token->change_pct}}% 
			</i> &nbsp;&nbsp;
			<a target="_blank" class="blue" href="{{str_replace('[SYM]',$token->symbol,setting('affiliatelink'))}}">Trade</a>
			
		</span> 
	</div>
	@endforeach
	
</div>	
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	{!! $title  !!}
			<table id="coinsTable" class="table table-striped token">
					<thead>
						<tr>
							<th>Name</th>
							<th>Logo</th>
							<th>Price</th>
							<th>%24h</th>
							<th>Volume</th>
							<th>Capitalization</th>
							<th>Supply</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
		</div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(e) {
	window.txTable = $('#coinsTable').dataTable({
		"order": [[ 5, 'asc' ]],
		"language": {
			"sDecimal":        ",",
			"sEmptyTable":     "{!! trans("admin.sEmptyTable")  !!}",
			"sInfo":           "{!! trans("admin.sInfo")  !!}",
			"sInfoEmpty":      "{!! trans("admin.sInfoEmpty")  !!}",
			"sInfoFiltered":   "{!! trans("admin.sInfoFiltered")  !!}",
			"sInfoPostFix":    "",
			"sInfoThousands":  ".",
			"sLengthMenu":     "{!! trans("admin.sLengthMenu")  !!}",
			"sLoadingRecords": "{!! trans("admin.sLoadingRecords")  !!}",
			"sProcessing":     "{!! trans("admin.sProcessing")  !!}",
			"sSearch":         "{!! trans("admin.sSearch")  !!}",
			"sZeroRecords":    "{!! trans("admin.sZeroRecords")  !!}",
			"oPaginate": {
				"sFirst":    "{!! trans("admin.sFirst")  !!}",
				"sLast":     "{!! trans("admin.sLast")  !!}",
				"sNext":     "{!! trans("admin.sNext")  !!}",
				"sPrevious": "{!! trans("admin.sPrevious")  !!}"
			},
			"oAria": {
				"sSortAscending":  "{!! trans("admin.sSortAscending")  !!}",
				"sSortDescending": "{!! trans("admin.sSortDescending")  !!}"
			}
		},
		processing: true,
		serverSide: true,
		"autoWidth": false,
		"ajax": {
			"url": "{{$table}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
		},
		order: [[ 4, "desc" ]] ,
		scrollY: 600,
        scroller: {
            loadingIndicator: false
        },
		"drawCallback": function( ) {
			$('[data-toggle="tooltip"]').tooltip();
		},
		type:'POST',
		columns: [
		
			{data: 'logo', name: 'logo', orderable:false},
			{data: 'name', name: 'name', orderable: true},
			{data: 'price', name: 'price', orderable: true},
			{data: 'change_pct', name: 'change_pct', orderable: true},
			{data: 'volume', name: 'volume'},
			{data: 'market_cap', name: 'market_cap'},
			{data: 'supply', name: 'supply'}
		  
		]
	});
});
</script>
@endpush



