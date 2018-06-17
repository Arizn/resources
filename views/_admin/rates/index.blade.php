@extends('adminlte::page')
@section('title')
Exchange rates
@endsection
@push('css')
 <link href="{{asset('/assets/admin/mycustom.css')}}" rel="stylesheet">
 <style>
 #ratestable_wrapper{
	 padding:15px;
 }
 </style>
@endpush
@section('content_header')
     <h1>
        Exchange Rates
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! trans("admin.dashboard")  !!}</a></li>
        <li class="active">Exchange Rates</li>
    </ol>
@endsection


@section("content")

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
			<a style="margin: 10px 0 0 10px;"  href="{{ url('/admin/rates/create') }}" class="btn btn-success btn-sm" title="Add New Rate">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
				<div >
			
					<table class="table table-bordered table-hover" id="ratestable">
                                <thead>
                                    <tr>
                                        <th>#</th>
										<th>Pair Id</th>
										<th>Rate</th>
										<th>Fees</th>
										<th>Min</th>
										<th>Max</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($rates as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
										<td>{{ $item->pair_id }}</td>
										<td>{{ $item->rate }}</td>
										<td>{{ $item->fees }}</td>
										<td>{{ $item->minimum }}</td>
										<td>{{ $item->maximum }}</td>
                                        <td>
                                            
											<a href="{{route('admin.rates.togglestatus',$item->id)}}" class="ajax_link refresh" title="Toggle Active status"><button class="btn  @if($item->active==1)btn-success @else btn-danger @endif btn-sm"><i class="fa @if($item->active==1)fa-check @else fa-times @endif" aria-hidden="true"></i> @if($item->active ==1)Active @else Inactive @endif</button></a>
											<a href="{{route('admin.rates.autoupdate',$item->id)}}" class="ajax_link refresh" data-toogle="tooltip" title="Toggle Auto update status"><button class="btn  @if($item->autoupdate==1)btn-success @else btn-danger @endif btn-sm"><i class="fa @if($item->autoupdate==1)fa-check @else fa-times @endif" aria-hidden="true"></i> @if($item->autoupdate ==1)AutoUpdate @else AutoUpdate @endif</button></a>
											
											<a href="{{ route('admin.rates.autocomplete',$item->id) }}" class="ajax_link refresh" title="Toggle Auto Complete status"><button class="btn  @if($item->autocomplete==1)btn-success @else btn-danger @endif btn-sm"><i class="fa @if($item->autocomplete==1)fa-check @else fa-times @endif" aria-hidden="true"></i> @if($item->autocomplete ==1)AutoComplete @else AutoComplete  @endif</button></a>
											
											<!--a href="{{ url('/admin/rates/' . $item->id) }}" title="View Rate"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a--->
                                            <a href="{{ url('/admin/rates/' . $item->id . '/edit') }}" title="Edit Rate"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/rates' . '/' . $item->id) }}" data-confirm="Are you sure you want to delete rate for {{ $item->pair_id }} " class="ajax_form confirm" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Rate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
						</div>
							
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


@endsection




@push('js')
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush

@section('js')

    <script>
        $(function() {
			$('.tooltips').tooltip();
           window.ratestable = $('#ratestable').dataTable({
                "order": [[ 2, 'asc' ]],
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
                
              
            });


        });
    </script>
@endsection
