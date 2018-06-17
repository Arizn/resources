@extends('adminlte::page')
@section('title')
Dashboard
@endsection
@section('content_header')
    <h1>
        {{ trans('admin.dashboard') }}
        <small>{{ trans('admin.controlpanel') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">
			<a href="#"><i class="fa fa-dashboard"></i> {{ trans('admin.dashboard') }}</a>
		</li>
    </ol>
@endsection
@push('css')
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush


@section("content")
        <!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $icolivecount }}</h3>
                <p>{{ trans('admin.waitingapprove') }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-check-circle"></i>
            </div>
            <a href="{{route('admin.tokenslist')}}" class="small-box-footer">{{ trans('admin.moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $tokenlivecount }}</h3>
                <p>{{ trans('admin.todaystokens') }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-text"></i>
            </div>
            <a href="/admin/all" class="small-box-footer">{{ trans('admin.moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $todaytoken }}</h3>
                <p>{{ trans('admin.tokenslisted') }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">{{ trans('admin.moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $totalOrders}}</h3>
                <p>ETH {{ trans('admin.totalsales') }}</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">{{ trans('admin.moreinfo') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">

      
           <!-- USERS LIST -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('admin.newmemberstoday') }}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route('users')}}"><span class="label label-info">{{ $todayusers }} {{ trans('admin.newmemberstoday') }}</span></a>
						
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">

                    <ul class="users-list clearfix">
                        @foreach($lastusers as $user)
                            <li style=" width: 20%;">
                                
                                <a class="users-list-name" target="_blank" href="/profile/{{ $user->name }}">{{$user->name}}</a>
                                <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route('users')}}" class="uppercase">{{ trans('admin.viewall') }}</a>
                </div><!-- /.box-footer -->
            </div><!--/.box -->
			
			<div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('admin.latestorders') }}</h3>
                    <div class="box-tools pull-right">
                       
						<a href="{{route('admin.orders')}}"><span class="label label-success">{{ $todaysales }} {{ trans('admin.orderstoday') }}</span></a>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="height:505px">
				<div class="table-responsive" style="overflow: auto;">
                    <table class="table table-striped" style="overflow: auto;">
                        <thead>
                        <tr>
                            <th  >{{ trans('admin.order') }}</th>
                            <th >{{ trans('admin.Status') }}</th>
							<th >{{ trans('admin.value') }}</th>
                            <th >{{ trans('admin.date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($lastorders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->status}}</td>
								<td>{{$order->symbol}}{{$order->amount}}</td>
								<td>{{$order->created_at}}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>

                    
					
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route('users')}}" class="uppercase">{{ trans('admin.viewall') }}</a>
                </div><!-- /.box-footer -->
            </div>
			
			
			
			
			
			
			<div class="box box-solid bg-light-blue-gradient">
				<div class="box-header">
					<i class="fa fa-th"></i>
					<h3 class="box-title">{{ trans('admin.moduleSettings') }}</h3>
					<div class="box-tools pull-right">
						<button class="btn bg-light-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn bg-light-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
            <div class="box-body border-radius-none">
			
			<div class="box-body" style="background-color: transparent">
                <div class="table-responsive" style="overflow: auto;">
                    <table class="table no-margin no-border" style="overflow: auto; color:white;">
                       
                        <tbody>
                          
						
							 <tr>
								<form method="post" class="ajax_form confirm" data-confirm ="This will replace all Multisig Addresses in the system?"action="{{route('settings.save')}}">
                                <td colspan="3">
                                 	<input type="hidden" value="make_coldKeys" name="make_coldKeys">
                                    <button type="submit" class="btn btn-lg btn-warning">{{trans('admin.mass_generate_keys')}} &nbsp;&nbsp; <i class="fa fa-download"></i></button>
                                </td>
								</form>
                            </tr>
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.BTC_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('BTC_coldKey')}}" name="BTC_coldKey" class="input-sm form-control">{{setting('BTC_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.BCH_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('BCH_coldKey')}}" name="BCH_coldKey" class="input-sm form-control">{{setting('BCH_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.LTC_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('LTC_coldKey')}}" name="LTC_coldKey" class="input-sm form-control">{{setting('LTC_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							 
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.ZEC_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('ZEC_coldKey')}}" name="ZEC_coldKey" class="input-sm form-control">{{setting('ZEC_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.BTG_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('BTG_coldKey')}}" name="BTG_coldKey" class="input-sm form-control">{{setting('BTG_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.DASH_coldKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<textarea placeholder="Please insert cold private key for BTC" type="text" value="{{setting('DASH_coldKey')}}" name="DASH_coldKey" class="input-sm form-control">{{setting('DASH_coldKey')}}</textarea>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.coinNetwork')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="coinNetwork" class="input-sm form-control">
									<option @if(setting('coinNetwork')=='testnet') selected @endif  value="testnet">Testnet</option>
									<option @if(setting('coinNetwork')=='mainnet') selected @endif  value="MULTI">Mainnet</option>
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.minConf')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" placeholder="eg ETH"  value="{{setting('minConf','3')}}" name="minConf" class="input-sm form-control">
								
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
							</tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.defaultFees')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="defaultFees" class="input-sm form-control">
									<option @if(setting('defaultFees')=='low') selected @endif  value="low">Low</option>
									<option @if(setting('defaultFees')=='medium') selected @endif  value="medium">Medium</option>
									<option @if(setting('defaultFees')=='high') selected @endif  value="high">High</option>
									
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
						
                        </tbody>
                    </table>
                </div>
				
            </div>


				
            </div><!-- /.box-body-->

        </div>
			
			
			
			
			
    </section><!-- /.Left col -->
	
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
	@if(setting('APP_MODE','ICO')!='ICO')
        <div class="box box-info" >
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('admin.listingsettings') }}</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" >
               <div class="table-responsive" style="overflow: auto;">
                    <table class="table no-margin" style="overflow: auto;">
                        <thead>
                        <tr>
                            <th width="5%">{{ trans('admin.setting') }}</th>
                            <th width="65%">{{ trans('admin.value') }}</th>
                            <th width="15%">{{ trans('admin.save') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.icolistingprice')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" type="text" value="{{setting('icolistingprice')}}" name="icolistingprice" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.tokenlistingprice')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" type="text" value="{{setting('tokenlistingprice')}}" name="tokenlistingprice" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.tokencreationprice')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" type="text" value="{{setting('tokencreationprice')}}" name="tokencreationprice" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.showbuybuttonprice')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" type="text" value="{{setting('showbuybuttonprice')}}" name="showbuybuttonprice" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.distributeTokenprice')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" type="text" value="{{setting('distributeTokenprice')}}" name="distributeTokenprice" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr> 
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.enablesitewidewallet')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in ETH" value="{{setting('enablesitewidewallet')}}" type="text" name="enablesitewidewallet" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
                       
                       
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->

        </div>
		
		@endif()

        <div class="box box-info box-solid"  style="background: #00c0ef;">
            <div class="box-header">
                <i class="fa fa-th"></i>
                <h3 class="box-title">{{ trans('admin.apisettings') }}</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool box-donut-get" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" style="background-color: transparent">
                <div class="table-responsive" style="overflow: auto;">
                    <table class="table no-margin no-border" style="overflow: auto; color:white;">
                        <thead>
                        <tr>
                            <th width="5%">{{ trans('admin.setting') }}</th>
                            <th width="65%">{{ trans('admin.value') }}</th>
                            <th width="15%">{{ trans('admin.save') }}</th>
                        </tr>
                        </thead>
                        <tbody>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.openExchangeRatesApiKey')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" value="{{setting('openExchangeRatesApiKey')}}" name="openExchangeRatesApiKey" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
                            <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.INFURATOKEN')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" value="{{setting('INFURATOKEN')}}" name="INFURATOKEN" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.ETHERSCANTOKEN')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" value="{{setting('ETHERSCANTOKEN')}}" name="ETHERSCANTOKEN" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.PARITYIP')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" value="{{setting('PARITYIP')}}" name="PARITYIP" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.ETHEREUMNETWORK')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<select  name="ETHEREUMNETWORK" class="input-sm form-control">
								@foreach(['olympic'=>0,'frontier'=>1,'mainnet'=>1,'homestead'=>1,'metropolis'=>1,'expanse'=>1,'morden'=>2,'ropsten'=>3,'rinkeby'=>4,'kovan'=>42] as $k=>$v)
								<option @if(setting('ETHEREUMNETWORK')== $k ) selected @endif  value="{{$k}}">{{ucfirst($k)}}</option>
								@endforeach
								</select>
								
								</td>
								<td>
                                
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.ETHEREUMPROVIDER')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<select   name="ETHEREUMPROVIDER" class="input-sm form-control">
									<option @if(setting('ETHEREUMPROVIDER')=='etherscan') selected @endif  value="etherscan">Etherscan.io</option>
									<option @if(setting('ETHEREUMPROVIDER')=='infura') selected @endif  value="infura">Infura.io</option>
									<option @if(setting('ETHEREUMPROVIDER')=='parity') selected @endif  value="parity">Parity</option>
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							
                       
                       
                        </tbody>
                    </table>
                </div>
				
            </div><!-- /.box-body -->

        </div>




        <!-- solid sales graph -->
        <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
                <i class="fa fa-th"></i>
                <h3 class="box-title">{{ trans('admin.dashBoardTokens') }}</h3>
                <div class="box-tools pull-right">
                    <button class="btn bg-light-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-light-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body border-radius-none">
			
			<div class="box-body" style="background-color: transparent">
                <div class="table-responsive" style="overflow: auto;">
                    <table class="table no-margin no-border" style="overflow: auto; color:white;">
                       
                        <tbody>
                            <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">                                
                                <td colspan="2">
								{{ csrf_field() }}
								<input type="text" value="{{setting('dashBoardTokens')}}" name="dashBoardTokens" class="input-sm form-control">
								</td>
                                
                                <td width="10%">
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.siteToken')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input type="text" placeholder="eg ETH"  value="{{setting('siteToken','ETH')}}" name="siteToken" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.siteCurrency')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select  name="siteCurrency" class="input-sm form-control">
								@foreach(\App\Models\Country::all() as $country)
								<option @if(setting('siteCurrency')== $country->currency ) selected @endif  value="{{$country->currency}}">{{$country->currency}} </option>
								@endforeach
								</select>
								
								
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.enablePayGateway')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="enablePayGateway" class="input-sm form-control">
									<option @if(setting('enablePayGateway')==0) selected @endif  value="0">No</option>
									<option @if(setting('enablePayGateway')==1) selected @endif  value="1">Yes</option>
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							  <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.enableExchange')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="enableExchange" class="input-sm form-control">
									<option @if(setting('enableExchange')=='yes') selected @endif  value="yes">YES</option>
									<option @if(setting('enableExchange')=='no') selected @endif  value="no">NO</option>
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.enableDeploy')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="enableDeploy" class="input-sm form-control">
									<option @if(setting('enableDeploy')=='yes') selected @endif  value="yes">YES</option>
									<option @if(setting('enableDeploy')=='no') selected @endif  value="no">NO</option>
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.maintenance')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="maintenance" class="input-sm form-control">
									<option @if(setting('maintenance')=='yes') selected @endif  value="yes">YES</option>
									<option @if(setting('maintenance')=='no') selected @endif  value="no">NO</option>
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.enableForum')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="enableForum" class="input-sm form-control">
									<option @if(setting('enableForum')=="no") selected @endif  value="no">No</option>
									<option @if(setting('enableForum')=='yes') selected @endif  value="yes">Yes</option>
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.membersOnlyExchange')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="membersOnlyExchange" class="input-sm form-control">
									<option @if(setting('membersOnlyExchange')==0) selected @endif  value="0">No</option>
									<option @if(setting('membersOnlyExchange')==1) selected @endif  value="1">Yes</option>
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
								<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.promowidget')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="promowidget" class="input-sm form-control">
									<!--option @if(setting('promowidget')=='exchanger') selected @endif  value="exchanger">QUICK TOKEN SWAP</option-->
									<option @if(setting('promowidget')=='hoticos') selected @endif  value="hoticos">HOT ICOS</option>
									<option @if(setting('promowidget')=='bitfamily') selected @endif  value="bitfamily">BTC LTC DASH Recieve Info</option>
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
							 <tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.tx_validity')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								<input placeholder="in Minutes" type="text" value="{{setting('tx_validity')}}" name="tx_validity" class="input-sm form-control">
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
                            </tr>
		
							
							
							
							<tr>
								<form method="post" class="ajax_form" action="{{route('settings.save')}}">
                                <td width="50%">
                                  {{trans('admin.APP_MODE')}}  
                                </td>
                                <td >
								{{ csrf_field() }}
								
								<select   name="APP_MODE" class="input-sm form-control">
									<option @if(setting('APP_MODE')=='ICO') selected @endif  value="ICO">ICO MODE</option>
									<option @if(setting('APP_MODE')=='MULTI') selected @endif  value="MULTI">MULTI USER MODE</option>
									
								</select>
								</td>
                                
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">{{trans('admin.save')}}</button>
                                </td>
								</form>
							</tr>
							
                        </tbody>
                    </table>
                </div>
				
            </div>


				
            </div><!-- /.box-body-->

        </div><!-- /.box -->

    </section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
@endsection
@push('js')
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush