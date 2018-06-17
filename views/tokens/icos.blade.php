
@extends('layouts.app')

@section('title')
Initial Coin Offerings
@endsection
@section('visibility')
 hidden
@endsection


@section('content')
	
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<h5>{!! $title  !!}</h5> 
			<table id="coinsTable" class="table table-striped token">
					<thead>
						<tr>
							<th>Token</th>
							<th>Name</th>
							<th>Price</th>
							<th>Bonus</th>
							<th>Started</th>
							<th>Ends</th>
							<th>Initial Supply</th>
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
			{data: 'ico_start', name: 'ico_start'},
			{data: 'ico_ends', name: 'ico_ends'},
			{data: 'total_supply', name: 'total_supply'}
		  
		]
	});
});
</script>
@endpush



