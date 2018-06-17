<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_prefix', config('gentelella.title_prefix', ''))
@yield('title', config('gentelella.title', 'Gentelella 2'))
@yield('title_postfix', config('gentelella.title_postfix', ''))</title>
    <!-- App Css -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @stack('header-scripts')
	@stack('css')
	@include('hotjar')
</head>