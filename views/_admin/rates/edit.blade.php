
@extends('adminlte::page')
@section('title')
Edit Rate #{{ $rate->id }}
@endsection
@push('css') 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link href="{{asset('/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" />
 
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush

@section('content_header')
     <h1>
       Edit Rate #{{ $rate->id }}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! __("admin.dashboard")  !!}</a></li>
        <li class="active">Edit Rate #{{ $rate->id }}</li>
    </ol>
@endsection

@section("content")

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div style="padding-bottom:30px" class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="{{ url('/admin/rates') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</button></a> &nbsp;&nbsp; Edit Rate #{{ $rate->id }}</h3>
            </div>
            
			<div class="card-body">
                        
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/rates/' . $rate->id) }}" accept-charset="UTF-8" class="form-horizontal ajax_form edit" data-edit="true" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('_admin.rates.form', ['submitButtonText' => 'Update'])

                        </form>

                    </div>
			
			
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush

@section('js')

    <script>
	$(function () {
		$('.message').wysihtml5();
		
		$('.datetime').datetimepicker({
			'format':'YYYY-MM-DD HH:mm:ss'
		});
		$('.select2').select2();
	  })
       
    </script>
@endsection
