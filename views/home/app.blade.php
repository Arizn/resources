<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	@if( Request::is( Config::get('chatter.routes.home')) )
    <title>Title for your forum homepage -  env('APP_NAME','icofury'))</title>
@elseif( Request::is( Config::get('chatter.routes.home') . '/' . Config::get('chatter.routes.category') . '/*' ) && isset( $discussion ) )
    <title>{{ $discussion->category->name }} - env('APP_NAME','icofury'))</title>
@elseif( Request::is( Config::get('chatter.routes.home') . '/*' ) && isset($discussion->title))
    <title>{{ $discussion->title }} - env('APP_NAME','icofury'))</title>
@else
 <title>@yield('title', env('APP_NAME','icofury'))</title>
@endif

   

    <!-- Bootstrap core CSS -->
    <link href="/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="/landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	@stack('css')
	@yield('css')
    <!-- Custom styles for this template -->
    <link href="/landing/css/creative.css" rel="stylesheet">
	  <link href="/landing/css/custom.css" rel="stylesheet">
 @include('hotjar')
  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include('home.nav')
    <section style="padding: 6rem 0 2rem 0; background-color:#007bff!important;" class="text-white">
      <div class="container text-center">
        <h2 class="mb-4">@yield('heading')</h2>
      </div>
    </section>
	
	@yield('content')

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next Coin with us? That's great! An instant wallet and merchant Gateway is waiting for your coin!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-skype fa-3x mb-3 sr-contact"></i>
            <p>ofuzak</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:stephen@ecurrency-hub.com">stephen@ecurrency-hub.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="/landing/vendor/jquery/jquery.min.js"></script>
    <script src="/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="/landing/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/landing/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="/landing/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	@stack('scripts')
    <!-- Custom scripts for this template -->
    <script src="/landing/js/creative.min.js"></script>
	@stack('js')
	@yield('js')

  </body>

</html>
