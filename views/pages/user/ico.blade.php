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
							
							<option value="{{$token->id}}">{{$token->name}} {{$token->symbol}}</option>
							
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
		
		@if( isset($icoToken->name))
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>BUY {{strtoupper($icoToken->symbol)}}</h2>
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
			<div style="height:315px" class="x_content">
					
					
					<p>
					  	Token Contract address
					  </p>

                      <div style="margin-top:5px; font-size:11px" ><a data-toggle="tooltip" title="Contract address" class="green" href="https://etherscan.io/token/{{$icoToken->contract_address}}">{{$icoToken->contract_address}}</a></div>
					 

                      
                      

                     <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-6 tile">
                        <span class="red">Total Buyers : <strong class="green">{{372+$token->icosales()->count()}}</strong></span>
                       
                        
                      </div>
                      <div class="col-md-6 tile">
                        <span class="red">Total: <strong class="green">{{number_format(18.87+$token->icosales->sum('ether'),2)}}ETH</strong></span>
                        
                      </div>
					  </div>

                      <div class="">
                        <div class="product_price">
                          <h2 id="ethereum" rate="{{$icoToken->price}}" class="green">ETH 1.00</h2>
                          <span class="price-tax">Bonus Tokens({{abs($icoToken->change_pct)}}%):<strong bonus="{{abs($icoToken->change_pct)/100}}"  id="bonus">{{$icoToken->price*abs($icoToken->change_pct)/100}}</strong> </span>
                          <br>
                        </div>
                      </div>
					  
					  @include('tokens.buyform')
                      
					 
					 <hr>
                      <div  class="product_social">
                        <ul class="list-inline">
                          <!--li><a href="#"><i class="fa fa-twitter-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-rss-square"></i></a>
                          </li-->
						   <li style="vertical-align:sub">
						 <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Ficofury.com%2Ficos%2Fekashcoin&width=185&layout=button_count&action=recommend&size=large&show_faces=true&share=true&height=46&appId=233621603488112" width="185" height="30" style="border:none;overflow:hidden" p scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                          </li>
                        </ul>
                      </div>

			</div>
		</div>
		</div>
		@endif
		
		@if(isset($icoToken->name))
	    <div class="col-md-4 col-sm-6 col-xs-12">
			<div class="x_panel">
			<div class="x_title">
					<h2>{{$icoToken->symbol}}</h2>
					&nbsp;
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
					<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
				</ul>
					<div class="clearfix"></div>
				</div>
				<div style="height:315px" class="x_content">
					
					  
                      

                     <div class="row top_tiles" style="margin: 10px 0;">
                      <div class="col-md-6 tile">
                        <span class="blue">Symbol : <strong class="green">{{$icoToken->symbol}}</strong></span>
                       
                        
                      </div>
                      <div class="col-md-6 tile">
                        <span class="blue"> Decimals : <strong class="green">{{$icoToken->decimals}}</strong></span>
                        
                      </div>
					  </div>

                      <div class="">
                        <div class="product_price">
						<span class="price-tax">Balance ({{$icoToken->symbol}})</span>
                          <h2 id="ethereum" rate="{{$icoToken->price}}" class="red">{{$tokenWallet->balance}}</h2>
						  <span class="price-tax green">ETH: {{$tokenWallet->balance==0?0.00000:number_format($tokenWallet->balance/$icoToken->price,8)}} </span> <br>
						  <span class="price-tax green">{{setting('siteCurrency','USD')}}: {{$tokenWallet->balance==0?0.00000:number_format($tokenWallet->balance/$icoToken->price*$ethToken->price,8)}} </span>
						  
                          
                          <br>
                        </div>
                      </div>

					 <p>
					  	{{str_limit($icoToken->description, 220)}}
					  </p>
					  
				</div>
			</div>
		</div>
		@endif
		@if(!isset($icoToken->name))
		<div class="col-md-8 col-sm-12 col-xs-12">
			<div style="min-height: 403px;" class="x_panel">
			<div class="x_title">
					<h2>BAL: {{$tokenWallet->balance}}{{$siteToken->symbol}}</h2>
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
					<p class="text-muted font-13 m-b-30"> Transaction History </p>
					<table id="tokensTable" class="table table-striped table-bordered">
					<thead>
							<th >{!! trans("home.Symbol_short")  !!}</th>
							<th >{!! trans("home.Type")  !!}</th>
                            <th >{!! trans("home.Value")  !!}</th>
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
		@endif
</div>
@if(isset($icoToken->name))
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
@endif
@if(isset($icoToken->name))
@include('tokens.infotab');
@endif

@endsection

@push('scripts')
<script>
$(document).ready(function(e) {
	var language = {
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
	};
		
		
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