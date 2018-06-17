
@extends('adminlte::page')
@section('title')
 {!! trans("admin.Orders")  !!}
@endsection
@push('css')
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
@endpush

@section('content_header')
     <h1>
        {!! trans("admin.Orders")  !!}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! trans("admin.dashboard")  !!}</a></li>
        <li class="active">{!! trans("admin.Orders")  !!}</li>
    </ol>
@endsection

@section("content")

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                       	 <tr>
							<th >{!! trans("admin.id")  !!}</th>
							<th >{!! trans("admin.User")  !!}</th>
							<th >{!! trans("admin.account")  !!}</th>
							<th >{!! trans("admin.Item")  !!}</th>
                            <th >{!! trans("admin.value")  !!}</th>
							<th >{!! trans("admin.created_at")  !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
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

@section('js')

    <script>
        $(function() {
			
           window.tokens = $('#table').dataTable({
                "order": [[ 5, 'asc' ]],
                "language": {
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
                },
                processing: true,
                serverSide: true,
                "autoWidth": false,
			    "ajax": {
					"url": "{{route('admin.orderslist')}}",
					"type": "POST",
					'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
				},
				type:'POST',
                columns: [
					{data: 'id', name: 'id'},
					{data: 'user', name: 'user',orderable: true},
					{data: 'address', name: 'address',orderable: true},
					{data: 'item', name: 'item'},
                    {data: 'amount', name: 'amount', orderable: true},
                    {data: 'created_at', name: 'created_at'},
                  
                ]
            });
			  


        });
    </script>
@endsection
