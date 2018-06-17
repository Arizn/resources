
@extends('layouts.app')

@section('title')
    Swap Shift
@endsection

@section('content')
@include('exchange.exchanger')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Exchange History</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
				</ul>
				<div class="clearfix"></div>
			</div>
			
			<div class="x_content">
				<p class="text-muted font-13 m-b-30"> Wallet Transactions </p>
				<table id="exchanges" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th >Date</th>
							<th >From</th>
							<th >Amount</th>
							<th >Status</th>
							<th >To</th>
							<th >Amount </th>
							<th >Status</th>
							<th >Reference</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts') 
<script>

$(document).ready(function(e) {
	
	window.exchangeTable = $('#exchanges').dataTable({
		"order": [[ 1, 'asc' ]],
		"language": language,
		processing: true,
		serverSide: true,
		searching: false,
		"autoWidth": false,
		initComplete:function(){
			$('.tooltips').tooltip();
		},
		"ajax": {
			"url": "{{route('exchange.history')}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
		},
		type:'POST',
		columns: [
			{data: 'created_at', name: 'created_at',orderable: true},
			{data: 'from', name: 'from', orderable: false},
			{data: 'fromamount', name: 'fromamount',orderable: false},
			{data: 'fromstatus', name: 'fromstatus',orderable: false},
			{data: 'to', name: 'to',orderable: false},
			{data: 'toamount', name: 'toamount',orderable: false},
			{data: 'tostatus', name: 'tostatus',orderable: false},
			{data: 'reference', name: 'reference',orderable: true},

		]
	});

});
    </script> 
@endpush
