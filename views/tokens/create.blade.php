@extends('layouts.app')

@section('title')
    List A Token
@endsection
@push('css')
<style>
a.clear{
	position: relative;
    left: 390px;
    top: 26px;
    z-index: 5;
	padding: 6px;
}
</style>
@endpush


@section('content')
	
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <form enctype="multipart/form-data" class="authorize form-horizontal form-label-left ajax_form" method="post" action="{{route('coins.store')}}" novalidate>
					{{csrf_field()}}
					
					<input name="password" type="hidden" class="password">
					
                      
                      <span class="section">ONLY ERC20 Tokens. Token MUST be Live on Mainnet</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Enter Token Name" required="required" type="text">
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Symbol <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="symbol" name="symbol" required="required" placeholder="Token symbol. Eg EKC" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Decimals <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="decimals" name="decimals" required="required" placeholder="Number of decimal Places Eg 18." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Contract Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contract_address" name="contract_address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_ABI_array">Contract ABI Json <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="contract_ABI_array" name="contract_ABI_array"  required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_Bin">Contract BIN 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="contract_Bin" name="contract_Bin"  class="optional form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_start">ICO start Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<a class="clear" href="javascript:;" onClick="$('#ico_start').val('')">Clear</a>
                          <input placeholder="Leave Empty if ICO is Completed" type="text" id="ico_start" name="ico_start"   class="datetime form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_end">ICO End Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<a class="clear" href="javascript:;" onClick="$('#ico_end').val('')">Clear</a>
                          <input placeholder="Leave Empty if ICO is Completed" type="text" id="ico_end" name="ico_ends"  class="datetime form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="token_price">Token Rate (ETH)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="token_price" name="token_price" required="required" placeholder="Number of tokens in 1 ETH" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Logo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="logo" name="logo" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> 
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="logo" name="logo" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> 
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="website"  placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter">Twitter @name<span class="optional">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="twitter" type="text" name="twitter" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="facebook" class="control-label col-md-3">facebook</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="facebook" type="text" name="facebook"  class="optional form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="optional">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="description" name="description"  class="optional form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="features">Features <span class="optional">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                              <input name="icolistingprice" type="checkbox" class="flat" >&nbsp;&nbsp;&nbsp; List ICO : <strong>{{setting('icolistingprice','0')}} ETH </strong>(For ICO ONLY)
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="showbuybuttonprice"class="flat">&nbsp;&nbsp;&nbsp; Enable Onsite Sale: <strong>{{setting('showbuybuttonprice','0')}} ETH </strong>(For ICO ONLY)
                            </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input checked="checked" type="checkbox" name="enablesitewidewallet" class="flat" >&nbsp;&nbsp;&nbsp; Enable in All Site Wallets : <strong>{{setting('enablesitewidewallet','0')}} ETH</strong>
                            </label>
                          </div>
						 
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>
@endsection

@section('footer_scripts')
@endsection