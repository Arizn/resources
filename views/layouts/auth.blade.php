<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('partials._head')
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        @yield('content')
    </div>
</div>
@if(Auth::check())
    <script>
        var userId = "{{ Auth::user()->id }}";
    </script>
@endif
<script>var PUSHERKEY = "{{env('PUSHER_APP_KEY')}}";</script>
<script>var PUSHER_CLUSTER = "{{env('PUSHER_CLUSTER')}}";</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/notifs.js')}}"></script>
@stack('scripts')
</body>
</html>
