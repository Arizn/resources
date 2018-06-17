
@extends('home.app')

@section('title')
 Latest ICO
@endsection
@section('heading')
 Latest ICO Listing
@endsection


@push('css')
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<style>
/*Write your Custom Css here*/
#nprogress .bar {
    background: #f4505d !important;
}

#nprogress .spinner-icon {
    border-top-color: #f4505d !important;
    border-left-color: #f4505d !important;
}
.table.token{
	font-size:15px;
}

.table.token>tbody>tr>td, 
.table.token>tbody>tr>th, 
.table.token>tfoot>tr>td, 
.table.token>tfoot>tr>th, 
.table.token>thead>tr>td, 
.table.token>thead>tr>th{
	padding: 15px;
	font-size:15px;
}

.img-circle.token_logo{
	height:25px; 
	width:auto; 
	vertical-align:middle;
}


/***
UI Loading
***/
.loading-message {
  display: inline-block;
  min-width: 125px;
  margin-left: -60px;
  padding: 10px;
  margin: 0 auto;
  color: #000 !important;
  font-size: 13px;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
}
.loading-message.loading-message-boxed {
  border: 1px solid #ddd;
  background-color: #eee;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
}
.loading-message > span {
  line-height: 20px;
  vertical-align: middle;
}

.page-loading {
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
  border-radius: 4px;
  position: fixed;
  top: 50%;
  left: 50%;
  min-width: 125px;
  margin-left: -60px;
  margin-top: -30px;
  padding: 7px;
  text-align: center;
  color: #333;
  font-size: 13px;
  border: 1px solid #ddd;
  background-color: #eee;
  vertical-align: middle;
  -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
}
.page-loading > span {
  line-height: 20px;
  vertical-align: middle;
}

.page-spinner-bar {
  position: fixed;
  z-index: 10051;
  width: 100px;
  top: 40%;
  left: 50%;
  margin-left: -55px;
  text-align: center;
}
.page-spinner-bar > div {
  margin: 0 5px;
  width: 18px;
  height: 18px;
  background: #eee;
  border-radius: 100% !important;
  display: inline-block;
  -webkit-animation: bounceDelay 1.4s infinite ease-in-out;
  animation: bounceDelay 1.4s infinite ease-in-out;
  /* Prevent first frame from flickering when animation starts */
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.page-spinner-bar .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.page-spinner-bar .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

.block-spinner-bar {
  display: inline-block;
  width: 80px;
  text-align: center;
}
.block-spinner-bar > div {
  margin: 0 2px;
  width: 15px;
  height: 15px;
  background: #eee;
  border-radius: 100% !important;
  display: inline-block;
  -webkit-animation: bounceDelay 1.4s infinite ease-in-out;
  animation: bounceDelay 1.4s infinite ease-in-out;
  /* Prevent first frame from flickering when animation starts */
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.block-spinner-bar .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.block-spinner-bar .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

.copy-text {
  position: relative;
  display: none;
}
.copy-text::before {
  content: attr(data-text);
  display: none;
}
.copy-text::after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
}
.copy-text.flash::after {
  content: attr(data-text);
  transition: 1s ease;
  transform: scale(2);
  opacity: 0;
}
.page-title .title_right{
	   width: 40%;
}
.page-title .title_left{
	   width: 60%;
}

.green{
	color: #1ABB9C;
}
.red{
	color: #C12325;
}
</style>
@endpush

@section('content')
	
<section style="padding: 2rem;"><div style="padding:0 10px 0 10px" class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<table id="coinsTable" class="table table-striped token">
					<thead>
						<tr>
							<th>Token</th>
							<th>Name</th>
							<th>Price ( PER 1 ETH )</th>
							<th>Bonus</th>
							<th>Started</th>
							<th>Ends</th>
							<th>Initial Supply</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
		</div>
</div></section>
@endsection


@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/scroller/1.4.2/js/dataTables.scroller.min.js"></script>
@endpush
@push('js')
<script src="{{asset('/assets/admin/FileSaver.min.js')}}"></script>
<script src="{{asset('/assets/admin/sweetalert2.all.js')}}"></script>
<script src="{{asset('/assets/admin/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('/assets/admin/init.js')}}"></script>
@endpush

@push('js')
<script>
$(document).ready(function(e) {
	window.txTable = $('#coinsTable').dataTable({
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
			"url": "{{$table}}",
			"type": "POST",
			'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}
		},
		order: [[ 4, "desc" ]] ,
		scrollY: 600,
        scroller: {
            loadingIndicator: false
        },
		"drawCallback": function( ) {
			$('[data-toggle="tooltip"]').tooltip();
		},
		type:'POST',
		columns: [
		
			{data: 'logo', name: 'logo', orderable:false},
			{data: 'name', name: 'name', orderable: true},
			{data: 'price', name: 'price', orderable: true},
			{data: 'change_pct', name: 'change_pct', orderable: true},
			{data: 'ico_start', name: 'ico_start'},
			{data: 'ico_ends', name: 'ico_ends'},
			{data: 'total_supply', name: 'total_supply'}
		  
		]
	});
});
</script>
@endpush

