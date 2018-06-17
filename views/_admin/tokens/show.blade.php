
@extends('adminlte::page')
@section('title')
{{$contract->name}}
@endsection
@push('css') 
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush

@section('content_header')
     <h1>
        {{$contract->name}}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! trans("admin.dashboard")  !!}</a></li>
        <li class="active">{{$contract->name}}</li>
    </ol>
@endsection

@section("content")

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$contract->name}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{trans('admin.contract_name')}} : </label>
				  <strong style="color:blue">{{$contract->name or ""}}</strong>
                  
                </div>
				<div class="form-group">
                  <label for="deploy_price">{{trans('admin.deploy_price')}}</label>
				   <strong style="color:blue">{{$contract->deploy_price or ""}}</strong>
                  
                </div>
                
				 <div class="form-group">
                  <label for="buy_tokens_function">{{trans('admin.buy_tokens_function')}}</label>
				  <strong style="color:blue">{{$contract->buy_tokens_function or ""}}</strong>
                 
				 
                </div>
				<div class="form-group">
                  <label for="abi">{{trans('admin.abi')}}</label>
				  <p style="color:green">{{$contract->abi or ""}}</p>
                 
                </div>
				 <div class="form-group">
                  <label for="bin">{{trans('admin.bin')}}</label>
				  <p style="color:green; word-break: break-word;">{{$contract->bin or ""}}</p>
                  
                </div>
				 <div class="form-group">
                  <label for="contract">{{trans('admin.contract')}}</label>
				  <p style="color:green">{{$contract->contract or ""}}</p>
                  
                </div>
				 <div class="form-group">
                  <label for="description">{{trans('admin.contract_description')}}</label>
                  {!!$contract->description or ""!!}
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


@endsection


@include('modals.modal-delete')

@push('js')
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush


