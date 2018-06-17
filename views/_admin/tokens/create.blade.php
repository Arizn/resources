
@extends('adminlte::page')
@section('title')
{{__('admin.addtoken')}}
@endsection
@push('css') 
 <link href="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
 
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush

@section('content_header')
     <h1>
        {{__('admin.addtoken')}}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! __("admin.dashboard")  !!}</a></li>
        <li class="active">{{__('admin.addtoken')}}</li>
    </ol>
@endsection

@section("content")

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div style="padding-bottom:30px" class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{__('admin.addtoken')}}</h3>
            </div>
            
			<form enctype="multipart/form-data" class="form-horizontal form-label-left ajax_form" method="post" action="{{route('admin.tokens.store')}}" novalidate>
			{{ csrf_field() }}
			<h3 style="text-align:center">{{__('admin.only_live_erc20')}}</h3>
			<hr>

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
                          <input type="text" id="symbol" name="decimals" required="required" placeholder="Number of decimal Places Eg 18." class="form-control col-md-7 col-xs-12">
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
                          <textarea id="contract_ABI_array" name="contract_ABI_array"  required="required"  class="form-control col-md-7 col-xs-12">
						  
						  </textarea>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_Bin">Contract BIN
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="contract_Bin" name="contract_Bin" placeholder="Optional"  class="optional form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_start">ICO start Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input placeholder="Leave Empty if ICO is Completed" type="text" id="ico_start" name="ico_start"   class="datetime form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ico_end">ICO End Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input placeholder="Leave Empty if ICO is Completed" type="text" id="ico_end" name="ico_ends"  class="datetime form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="token_price">Token Price (ETH)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="token_price" name="token_price" required="required" placeholder="price eg 200 or method e.g getprice()" class="form-control col-md-7 col-xs-12">
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
                          <input type="file" id="logo" name="image" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
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
                          <textarea id="description" name="description"  class="description optional form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="features">Features <span class="optional">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="features" name="features"  class="description optional form-control col-md-7 col-xs-12"></textarea>
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
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


@endsection

@push('js')
<script type="text/javascript" src="{{asset('/bower_components/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
  
<script src="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/notify.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush

@section('js')

    <script>
	$(function () {
		$('.description').wysihtml5();
		$('.datetime').datetimepicker({
			'format':'YYYY-MM-DD HH:mm:ss'
		});
	  })
       
    </script>
@endsection
