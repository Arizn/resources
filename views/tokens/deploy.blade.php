@extends('layouts.app')
@section('title')
    Deploy a Token
@endsection


@section('content')
<div class="row">
<form action="{{route('deploy.store')}}"  enctype="multipart/form-data" class="form-horizontal form-label-left input_mask authorize ajax_form">
{!!csrf_field()!!}
	<div class="col-md-6 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Deploy ERC20 Token</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Show Help</a> </li>
							<li><a href="#">Hide Help</a> </li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content" style="min-height:705px;"> <br />
				
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Contract</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<select id="contract" name="contract" class=" form-control deploy select select2">
							<option value="" >Select A contract</option>
							@foreach($contracts as $contract)
								<option id="c{{$contract->id}}" value="{{$contract->id}}">{{$contract->name}}</option>
							@endforeach
							</select>
						</div>
					</div>
					@foreach($contracts as $contract)
					<div class="tokendetail" style="display:none" id="d{{$contract->id}}">
						<span class="section">Description</span><p>{!!$contract->description!!} </p>
						{!!$contract->construction!!}
					</div>
					@endforeach
					<div class="item form-group">
						<label class="control-label col-md-5 col-sm-5 col-xs-12" for="token_price">Buyers Support Email</label>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<input type="text" id="support_email" name="support_email"  placeholder="Email for buyers to contact you" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="ln_solid"></div>
				
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Token Details</h2>
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
			<div class="x_content" style="min-height:490px"> <br />
				
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_start">ICO start<span class="required">*</span> </label>
						<input type="hidden" id="password" class="password" name="password" value="">
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="ico_start" name="ico_start" required="required"  class="datetime form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_end">ICO End<span class="required">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" id="ico_end" name="ico_ends" required="required"  class="datetime form-control col-md-7 col-xs-12">
						</div>
					</div>
					
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Image (400x500px) <span class="required">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" id="image" name="image" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
						<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Logo <span class="required">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" id="logo" name="logo" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter">Twitter @name<span class="optional">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="twitter" type="text" name="twitter" class="optional form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="item form-group">
						<label for="facebook" class="control-label col-md-3">facebook</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="facebook" type="text" name="facebook"  class="optional form-control col-md-7 col-xs-12" >
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="optional">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea id="description" name="description"  class="optional form-control col-md-7 col-xs-12"></textarea>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="features">Features <span class="optional">*</span> </label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea id="features" name="features"  class="optional form-control col-md-7 col-xs-12"></textarea>
						</div>
					</div>
					<div class="form-group">
                       
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="features">Services <span class="optional">*</span> </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
						  <div class="checkbox">
                            <label>
                              <input type="checkbox" name="tokencreationprice" class="flat" disabled="disabled" checked="checked">&nbsp;&nbsp;&nbsp;Deploy : <strong>{{setting('tokencreationprice','0')}} ETH</strong>
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input name="icolistingprice" type="checkbox" class="flat" checked="checked">&nbsp;&nbsp;&nbsp; List ICO : <strong>{{setting('icolistingprice','0')}} ETH</strong>
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="showbuybuttonprice"class="flat">&nbsp;&nbsp;&nbsp; Enable Onsite Sale: <strong>{{setting('showbuybuttonprice','0')}} ETH</strong>
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="enablesitewidewallet" class="flat" >&nbsp;&nbsp;&nbsp; Create Wallets : <strong>{{setting('enablesitewidewallet','0')}} ETH</strong>
                            </label>
                          </div>
						   <!--div class="checkbox">
                            <label>
                              <input id="distribute" type="checkbox" class="flat" >&nbsp;&nbsp;&nbsp; KickStart Distribution : <strong>{{setting('distributeTokenprice','0')}} ETH</strong>
                            </label>
                          </div-->
                        </div>
                      </div>
					  <div style="display:none" class="dsty item form-group">
						<label for="distribute_amount" class="control-label col-md-3">Distribute Amount</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="distribute_amount" type="text" name="distribute_amount"  class="optional form-control col-md-7 col-xs-12" >
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="submit" class="btn btn-primary">Cancel</button>
							<button id="send" type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection

@section('footer_scripts')
@endsection