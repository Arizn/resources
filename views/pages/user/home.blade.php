@extends('layouts.app')

@section('title')
    {{ $user->account->account }}
@endsection

@push('styles')
<style>
.wallets .dataTables_scroll{
	max-height: 240px;
}
</style>
@endpush

@section('content')
	
	<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Send</small></h2>
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
			<div class="x_content"> <br>
					<form data-table="txTable|walletsTable"  action="{{route('wallets.send')}}" class="form-horizontal form-label-left input_mask ajax_form authorize">
					{{ csrf_field() }}
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Amount</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="amount" class="form-control" placeholder="Amount">
						</div>
						</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Wallet</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							<select name="token_id" class="token form-control input-md input-medium select2">
							
							@foreach($user->wallets as $wallet)
							@if(!empty($wallet->token))
								<option @if(empty($wallet->token->contract_address)&&$wallet->token->symbol!='ETH') fee="txfee" @else fee="gas" @endif value="{{$wallet->token->id}}">{{$wallet->token->name}} {{$wallet->token->symbol}}</option>
							@endif
							@endforeach
							
							</select>
						</div>
						</div>
					<div class="form-group">
							<div class="col-md-12 col-sm-12 col-xs-12">
							<input name="to" type="text" class="form-control" placeholder="To">
							<input name="password" class="password" type="hidden" value="">
						</div>
						</div> 
					<div class="form-group gaslimit">
							<div class="col-md-12 col-sm-12 col-xs-12">
							<input name="gasLimit" type="text" class="form-control" placeholder="Gas Limit (Optional)">
						</div>
						</div>
					<div class="form-group gasprice">
							<div class="col-md-12 col-sm-12 col-xs-12">
							<input name="gasPrice" type="text" class="form-control" placeholder="Gas Price (Optional)">
						</div>
						</div>
					<div class="ln_solid"></div>
					<div class="form-group">
							<div class="col-md-12 col-sm-9 col-xs-12">
							<button type="button" class="btn btn-danger">Cancel</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" class="btn btn-success">Send</button>
						</div>
						</div>
				</form>
				</div>
		</div>
		</div>
		
	    @if(setting('promowidget')=='hoticos')
		@include('pages.user.hottest')
		@elseif(setting('promowidget')=='bitfamily')
		@include('pages.user.bitwallets')
		@elseif(setting('promowidget')=='exchanger')
		@include('pages.user.exchanger')
		@endif
		
	    <div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Wallets</h2>
					&nbsp;<small style="line-height: 4;"><a class="blue tooltips" onClick="$('#add').slideToggle('slow')" data-original-title="Add A Token"  href="javascript:;">Add Token</a></small>
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
			<div style="height:315px" class="x_content wallets">
					<div id="add" class="row" style="display:none">
						<form data-table="walletsTable" method="post" class="ajax_form authorize" action="{{route('wallets.add')}}">
							{{ csrf_field() }}
							<div class="col-md-8">
								<select name="token_id" style="width:150px" class="select2 form-control">
								@foreach($TokensList as $k=>$v)
									<option value="{{$k}}">{{$v}}</option>
								@endforeach
								</select>
							
							</div>
							<div class="col-md-4">
								<input type="hidden" name="password" id="password">
								<button type="submit" onClick="$('#add').slideToggle('slow')"  class="btn  btn-success">{{trans('home.add')}}</button>
							</div>
						</form>
                    </div>
			
					<table class="table table-hover" id="wallets">
						<thead>
							<tr>
								<th>SYM</th>
								<th>USD</th>
								<th>BAL</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
  
</div>

	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>Transactions History</small></h2>
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
					<p class="text-muted font-13 m-b-30"> Wallet Transactions </p>
					<table id="tokensTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th >{!! trans("home.Symbol_short")  !!}</th>
							<th >{!! trans("home.Type")  !!}</th>
                            <th >{!! trans("home.Value")  !!}</th>
							<th >{!! trans("home.From")  !!}</th>
							<th >{!! trans("home.To")  !!}</th>
                            <th >{!! trans("home.hash")  !!}</th>
							<th >{!! trans("home.created_at")  !!}</th>
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
	window.txTable = $('#tokensTable').dataTable({
		"order": [[@if(setting('APP_MODE','ICO')=="MULTI"||(setting('APP_MODE','ICO')=="ICO" && isset($icoToken->name)))6 @else 4 @endif, 'desc' ]],
		"lengthMenu": [4, 10, 15],
        "pageLength": @if(setting('APP_MODE','ICO')=="MULTI"||(setting('APP_MODE','ICO')=="ICO" && isset($icoToken->name)))10 @else 4 @endif,
		"language": language,
		processing: true,
		serverSide: true,
		initComplete:function(){
			$('.tooltips').tooltip();
		},
		"autoWidth": false,
		"ajax": {
			"url": "{{route('transactions.table')}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
		},
		type:'POST',
		columns: [
			{data: 'symbol', name: 'symbol', orderable: true},
			{data: 'type', name: 'type'},
			{data: 'amount', name: 'amount', orderable: true},
			@if(setting('APP_MODE','ICO')=="MULTI"||(setting('APP_MODE','ICO')=="ICO" && isset($icoToken->name)))
			{data: 'from_address', name: 'from_address'},
			{data: 'to_address', name: 'to_address'},
			@endif
			{data: 'tx_hash', name: 'tx_hash'},
			{data: 'created_at', name: 'created_at'},
		  
		]
	});
	
	
	
	window.walletsTable = $('#wallets').dataTable({
		"order": [[ 5, 'asc' ]],
		"language": language,
		processing: true,
		serverSide: true,
		searching: false,
		"autoWidth": false,
		"ajax": {
			"url": "{{route('wallets.table')}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
		},
		order: [[ 2, "desc" ]] ,
		scrollY: 240,
        scroller: {
            loadingIndicator: false
        },
		"drawCallback": function( ) {
			$('[data-toggle="tooltip"]').tooltip();
		},
		type:'POST',
		columns: [
			{data: 'symbol', name: 'symbol', orderable: false},
			{data: 'usd_balance', name: 'usd_balance',orderable: false},
			{data: 'balance', name: 'balance', orderable: true},
			{data: 'action', name: 'action',orderable: false}
			
		]
	});

			  


});
    </script>
@endpush