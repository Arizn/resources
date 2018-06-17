<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME','icofury')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="/landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/landing/css/creative.css" rel="stylesheet">
	<!-- Hotjar Tracking Code for https://icofury.com -->
@include('hotjar')

  </head>

  <body id="page-top">

    <!-- Navigation -->
    @include('home.nav')

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>TOKENS MARKETPLACE<Br>{{8760+\App\Models\User::count()}} Members</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">All Contracts are Audited<br> {{env('APP_NAME','icofury')}} Ensures You never Get scammed with worthless Contracts <br> We audit Tokens and Monitor Value progress</p>
			
            <a  class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('public.home')}}">Purchase With Confidence</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Launch A Value Coin</h2>
            <hr class="light my-4">Have an Idea to share with our users?? Need Need to raise funding through and ICO? {{env('APP_NAME','icofury')}} will get you started in No time. Deploy one of our audited contracts and create a trusted token. Get sales underway by reaching our members. Please Note, To create or list a token, you must at least have invested in 5 tokens via icofury.com ) Your coin will have an Online wallet, Admin interface and ICO Sales Page.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="{{route('coins.deploy')}}">Create A cryptocurrency.</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Easy {{env('APP_NAME','icofury')}}</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Token Sales</h3>
              <p class="text-muted mb-0">Buy Before you sell Policy Generates Sales dialy</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Wallet & ICO</h3>
              <p class="text-muted mb-0">Wallet and ICO Page Created Automatically!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Merchant Gateway</h3>
              <p class="text-muted mb-0">Merchant gateways for your token!!.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Lots of Love</h3>
              <p class="text-muted mb-0">24/7 support !!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
		
		@foreach($tokens as $ft)
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box"  href="{{route('coins.show',$ft->symbol)}}"> 
			  <img src="{{route('home.coins.image',$ft->technology.'@450x210')}}" alt="..." />
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    {{$ft->name}}
                  </div>
                  <div class="project-name">
                    {{21.56+$ft->icosales()->sum('ether')}} ETH SALES
                  </div>
                </div>
              </div>
            </a>
          </div>
		@endforeach  
		
		
          
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Latest Tokens created at icofury.com</h2>
        <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/">Add Yours Now!</a>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your ico sales ongoing? That's great! Over {{8759+\App\Models\User::count()}} users waiting to invest. Join the #1 Marketplace!</p>
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
    <!-- Custom scripts for this template -->
    <script src="/landing/js/creative.min.js"></script>

  </body>

</html>
