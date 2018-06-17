
@extends('adminlte::page')
@section('title')
{{__('admin.newcontract')}}
@endsection
@push('css') 
 <link href="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush

@section('content_header')
     <h1>
        {{__('admin.newcontract')}}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! trans("admin.dashboard")  !!}</a></li>
        <li class="active">{{__('admin.newcontract')}}</li>
    </ol>
@endsection

@section("content")






<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div style="padding-bottom:30px" class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
			<form enctype="multipart/form-data" data-edit="true" class="form-horizontal form-label-left ajax_form" method="post" action="{{route('contracts.store')}}">
			{{ csrf_field() }}
			<h3 style="text-align:center">{{__('admin.newcontract')}}</h3>
			<hr>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exampleInputEmail1">{{trans('admin.contract_name')}} </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" value="{{$contract->name or ""}}"  id="name" name="name"  placeholder="{{trans('admin.enter_name')}}">
               		  </div>
				</div>
				
				<div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deploy_price">{{trans('admin.deploy_price')}} </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" value="{{$contract->deploy_price or ""}}"  id="deploy_price" name="deploy_price"  placeholder="{{trans('admin.enter_deploy_price')}}">
						</div>
                </div>
                
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="buy_tokens_function">{{trans('admin.buy_tokens_function')}} </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" id="buy_tokens_function" name="buy_tokens_function"  value="{{$contract->buy_tokens_function or ""}}" placeholder="{{trans('admin.enter_buy_tokens_function')}}">
						 </div>
                </div>
				<div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abi">{{trans('admin.abi')}}</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
                  	<textarea rows="6" class="form-control col-md-7 col-xs-12" id="abi" name="abi" placeholder="{{trans('admin.enter_abi')}}">{{$contract->abi or ""}}</textarea>
				  </div>
                 </div>
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mainsale_abi">Mainsale (ICO ) Abi</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
                  	<textarea rows="6" class="form-control col-md-7 col-xs-12" id="mainsale_abi" name="mainsale_abi" placeholder="Mainsale(ICO ) Abi if ICO contract is different from the token contract. Leave Empty to disable"></textarea>
				  </div>
                 </div>
				 
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bin">{{trans('admin.bin')}}</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea  rows="6" class="form-control col-md-7 col-xs-12" id="bin" name="bin" placeholder="{{trans('admin.enter_bin')}}">{{$contract->bin or ""}}</textarea>
				  </div>
                </div>
				
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract">{{trans('admin.contract')}}</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea rows="6"  class="form-control col-md-7 col-xs-12" id="contract" name="contract" placeholder="{{trans('admin.enter_contract')}}">{{$contract->contract or ""}}</textarea>
                </div></div>
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="admin_functions">{{trans('admin.contract_admin_functions')}}</label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
                   <textarea rows="6"  class="form-control col-md-7 col-xs-12" id="admin_functions" name="admin_functions" placeholder="{{trans('admin.enter_contract_admin_functions')}}">{{$contract->admin_functions or ""}}</textarea>
                </div></div>
				
				 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{trans('admin.contract_description')}}</label>
				  	<div class="col-md-6 col-sm-6 col-xs-12">
                   		<textarea  class="form-control description" id="description" name="description" placeholder="{{trans('admin.enter_description')}}n">{{$contract->description or ""}}</textarea>
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
</section>









@endsection


@include('modals.modal-delete')

@push('js')
<script src="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush

@section('js')

    <script>
	$(function () {
		$('#description').wysihtml5()
	  })
       
    </script>
@endsection
