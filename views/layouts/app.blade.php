<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<style>
div.DTS div.dataTables_scrollBody{
	background:none;
}
</style>
<body class="nav-md" >
<div class="container body">

    <div class="main_container">

    {{--top nav--}}
    @include('partials._sidenav')
    {{--/topnav--}}

    <!-- top navigation -->
    @include('partials._topnav')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col " role="main" >
            <div class="page-title @yield('visibility') ">
                <div class="title_left">
                    <h3>@yield('page_title',new Illuminate\Support\HtmlString('<a href="javascript:void(0)" data-copythis="'.auth()->user()->account->account.'" class=" copy font-green-haze">'.auth()->user()->account->account.'</a><a  href="#"  style="font-size: 10px;"  class="copy-text pull-right">copy</a>'))</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="data-pjax">
                @yield('content')

            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
    @include('partials._footer')
    <!-- /footer content -->
    </div>
</div>
@if(Auth::check())
    <script>
        var userId = "{{ Auth::user()->id }}";
    </script>
@endif
<script>var PUSHERKEY = "{{env('PUSHER_APP_KEY')}}";</script>
<script>var PUSHER_CLUSTER = '{{env("PUSHER_CLUSTER")}}';</script>
<script>
	var language = {
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
	};
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/notifs.js')}}"></script>
@include('partials._notification')

@stack('scripts')
<script>
PNotify.defaults.styling = "brighttheme"
</script>

</body>
</html>