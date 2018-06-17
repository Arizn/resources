<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- Website Title -->
	<title>{{strtoupper($token->name)}}</title>
	
	<!-- OG Meta Tags -->
	<!-- To improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />
	
	<!-- Description Meta Tags -->
	<meta name="description" content="Make your event shine online and register visitors on any desktop or mobile device with this elegant and responsive event landing page template.">
	<meta name="keywords" content="event landing page, template, visitor registration, contact form, responsive, mobile first, html, bootstrap">
	
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet"> <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> <!-- Google Fonts -->
	<link href="/assets/ico/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/ico/css/flexslider.css" rel="stylesheet">
	<link href="/assets/ico/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/ico/css/animate.css" rel="stylesheet"> <!-- for fadein animation of the page -->
	<link href="/assets/ico/css/styles.css" rel="stylesheet">
	<style>
	  .profile_thumb {
			border: 1px solid;
			max-width: 150px;
			margin: 5px 10px 5px 0;
			border-radius: 50%;
			padding: 9px 12px;
		}
		.tiny_thumb {
			border: 1px solid;
			max-width: 50px;
			margin: 5px 10px 5px 0;
			border-radius: 50%;
			padding: 9px 12px;
		}
		.border-aero {
			border-color: #9CC2CB !important;
		}
	</style>
	@include('hotjar')
	<!-- Favicon 
	<link href="images/favicon.png" rel="shortcut icon"--->
	
</head>
<body data-spy="scroll" data-target="#myNav">
	
	<!-- Preloader FadeIn Animation -->
	<div id="main-container" class="animated fadeIn"> 
		
		<!-- Header -->
		<div id="header">
			<div class="flex-container-wrapper"> <!-- IE fix for vertical alignment in flex box -->
				<div class="header-content">
					<div class="row">
						<div class="col-sm-12">
							<img  class="border-aero profile_thumb"  src="{{route('home.coins.image',$token->logo)}}" alt="logo">
							<div class="countdown text-center">
								<span end="{{$token->ico_ends}}" id="clock"></span>
							</div>
							<p>ICO  STARTS {{$token->ico_start->toDayDateTimeString()}} ENDS {{$token->ico_ends->toDayDateTimeString()}}</p>
							<div class="registration-form">
								 {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST'] ) !!}
                {{csrf_field()}}
									{!! Form::email('email', null, [ 'id' => 'email', 'placeholder' => 'E-Mail Address', 'required']) !!}
									 {!! Form::password('password', [ 'id' => 'password', 'placeholder' => 'Password', 'required']) !!}
									
									<input type="submit" value="Login">
									<a class="register" href="{{route('register')}}">Register</a>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- end of header -->
		
		
		<!-- Navbar -->
		<nav id="myNav" class="navbar navbar-inverse" data-spy="affix">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a  style=" color:white"href="#header"><img  class="border-aero tiny_thumb"  src="{{route('home.coins.image',$token->logo)}}" alt="logo">{{strtoupper($token->name)}}</a>
						</div>
						
						<!-- Collection of nav links and other content for toggling -->
						<div id="navbarCollapse" class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#header">Register</a></li>
								<li><a href="#description">White Paper</a></li>
								<li><a href="#agenda">Road Map</a></li>
								<li><a href="#speaker-presentation-1">Features</a></li>
								<li><a href="/login">Login</a></li>
								<li><a href="/register">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav> <!-- end of navbar -->
		
		
		<!-- Description -->
		<div id="description" class="animated">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>WHITE PAPER</h2>
						<p><strong>{{$token->name}}</strong> Is  just like cash But Digital. Its like your personal bank where you can save for the future. XGT is locked from Day One. Yeah anyone can recieve But none can spend before 10 Years. Xgt is filled with value. For Every ETH you get 1000 XGT. In 10 Years you will receive 1,000,000 XGT!! released to Your Investment Address</p>
						<a href="#header" class="btn button-primary"><i class="fa-download fa"></i> White Paper</a>
						<a href="{{route('login')}}" class="btn button-secondary">INVEST NOW</a>
					</div>
					
					<div class="col-md-6">
						<!-- Slider Gallery -->
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="/assets/ico/images/event-gallery-1.jpg" alt="event image 1"/>
								</li>
								<li>
									<img src="/assets/ico/images/event-gallery-2.jpg" alt="event image 2"/>
								</li>
								<li>
									<img src="/assets/ico/images/event-gallery-3.jpg" alt="event image 3"/>
								</li>
								<li>
									<img src="/assets/ico/images/event-gallery-4.jpg" alt="event image 4"/>
								</li>
							</ul>
						</div> <!-- end of slider -->
					</div> 
				</div> 
			</div> 
		</div> <!-- end of description -->
	
		
		<!-- Agenda -->
		<div id="agenda" class="animated">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>ROADMAP</h2>
						<div class="row">
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">JAN 2018 </p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>Conception:</strong> Conceipt Development and white paper</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">MARCH 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>Team Building:</strong> Putting Together a team to  bring the conceipt into existance</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">MAY 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>Development:</strong> Development of the the various wallets and blockchain system</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">JULY 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>Lead Generation:</strong> Preparing Advertising and social platforms</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">SEPT 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>Coffee Break:</strong> Team Takes a break pre Launch Phase</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">NOV 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>ICO and ADMIN/MINER BOUNTY:</strong> Getting the admins and miners into place</p>
							</div>
							<div class="col-sm-2 col-sm-offset-1">
								<p class="time-interval">DEC 2018</p>
							</div>
							<div class="col-sm-8">
								<p class="event-segment"><strong>INVESTING AND TRADING:</strong> Everything is OPEN so happy earning</p>
							</div>
						</div>
					</div>
				</div> 
			</div> 
		</div> <!-- end of agenda -->
		
		
			<!-- Invitation 1 -->
		<div id="invitation-1" class="animated">
			<div class="bowtie"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>THE 401K OF THE FUTURE</h2>
						<p>Join 12 months of proserty. Tripple you income and move to secure 2019. Let 2019 be your year of properity. For only 10$ investment you will earn 1000$ in one year</p>
						<a href="{{route('login')}}" class="btn button-primary">REGISTER</a>
						<a href="{{route('register')}}" class="btn button-secondary">JOIN</a>
					</div>
				</div>
			</div>
		</div> <!-- end of invitation 1 -->
		
		
	
		<!-- Speaker Presentation 1 >
		<div id="speaker-presentation-1" class="animated">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-push-6">
						<h2></h2>
						<h3>Manage  - miners , assets and updates by consensus</h3>
						<p>The admins Basically decide the path of the blockchain via consensus. For example for an Update to be adopted 60% of admins must accept the update. This permission is locked in to an address in the blockchain and whoever has the private keys is basically the admin. </p>
						<p class="blockquote">“Can anyone Mine or be an admin??.”</p>
						<p>YES and NO. Initially only 100 admin addresses and 200 Mining addresses will be sold at the ICO. After that anyone interested will basically place a bounty for the permission. admins will grant the permission and be paid in first come first serve to grant this permission .<strong>NOTE: 10 Admin and 10 mining addresses will be reserved by the developers</strong> </p>
					</div>
					<div class="col-md-6 col-md-pull-6 text-center">
						<img class="img-responsive center-block" src="/assets/ico/images/john-maxwell-presentation.png" alt="John Maxwell Presentation">
					</div>
				</div>
			</div>
		</div> <!-- end of speaker presentation 1 -->
		
		
		
	
		
		<!-- Location -->
		<div id="section-video">
			<div class="container">
				<div class="video row">
					<div class="col-md-6">
						<!-- Tabs -->
						<ul class="nav nav-pills">
							<li class="active"><a href="#tab_a" data-toggle="tab" class="hvr-fade">XGT</a></li>
							<li><a href="#tab_b" data-toggle="tab" class="hvr-fade">WHY</a></li>
							<li><a href="#tab_c" data-toggle="tab" class="hvr-fade">YOU</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab_a">
								<p>For the first Time Ever, the crypto universe will experience a true investment opportunity. XGT is the 401K plan For next year. Its a Get in, leave it, Get out thing</p>
								<ul class="fa-ul">
									<li><i class="fa-li fa fa-check"></i>One Time Investment 1000XGT</li>
									<li><i class="fa-li fa fa-check"></i>YOUR wallet will be available after 360 Days with 1,000,000XGT</li>
									<li><i class="fa-li fa fa-check"></i>XGT Trading starts 2019 Feb 28th</li>
								</ul>
							</div>
							<div class="tab-pane fade" id="tab_b">
								<p>To built a strong future we have designed a token of the future. We believe we can create a truly Peorful investment vehicle for all:</p>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
										ICO PRESALE: 23BTC/30BTC
									</div>
								</div>
								<div class="progress">	
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
										ICO PREMUIM : 50/50BTC
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										ICO 120/400BTC
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab_c">
								<p> Hardware wallet: Ledger Nano S, Treazor Especially: The wallet is designed to be stored and used
easily on the XGT/Ethereum ecosystem. So the security is be extremely high and friendly yet
convenient for the owner. Mobile wallet app is designed with the highest level of security and is a  user-friendly available in all app stores</p>
								<a class="button center-block text-center hvr-fade" href="index.html#section-header">READ MORE</a>
							</div>
						</div><!-- end of tab content -->
					</div><!-- end of col-md-6 -->
					<div id="animated-video" class="col-md-6 animated">
					<div class="embed-responsive embed-responsive-16by9 pavo-video">
						<iframe src="https://player.vimeo.com/video/186251146?color=08a5df&amp;title=0&amp;byline=0&amp;portrait=0" width="640" height="360" allowfullscreen></iframe>
					</div>
					</div> <!-- end of col-md-6 -->
				</div> <!-- end of video -->
			</div> <!-- end of container -->
		</div> <!-- end of location -->
		
		
		
		
		
		<!-- Footer -->
		<div id="footer" class="animated">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footer-first">
						<h3>ekash is social</h3>
						<p class="organizer-information"><strong>Join</strong> the banking revolution.</p>
						&nbsp;<i class="fa fa-facebook fa-lg"></i>&nbsp;&nbsp;<a href="https://facebook.com/ekashjoin">ekashjoin</a><br>
						<i class="fa fa-twitter fa-lg"></i> &nbsp;@ekashjoin<br>
						<i class="fa fa-youtube fa-lg"></i> &nbsp;&nbsp;&nbsp;<a href="https://youtube.com/ekashjoin">ekashjoin</a><br>
						<i class="fa fa-telegram"></i>&nbsp; &nbsp;<a href="mailto:info@{{$token->name}}.com">ekashjoin</a><br>
						<i class="fa fa-internet-explorer"></i>&nbsp; &nbsp;<a href="#">www.{{$token->name}}.com</a><br>
					</div>
					<div class="col-md-4 col-sm-6 footer-second">
						<h3>Links</h3>
						<p>Bitcoin - <a href="https://www.bitcoin.org">www.bitcoin.org</a></p>
						<p>Multichain - <a href="https://www.multichain.com">www.multichain.com</a></p>
						<p>Digital Ocean - <a href="https://www.digitalocean.com">https://www.digitalocean.com</a></p>
						<p>{{$token->name}} - <a href="https://www.{{$token->name}}.com">www.{{$token->name}}.com</a></p>
						<p>ecurrency-hub - <a href="https://www.ecurrency-hub.com">www.ecurrency-hub.com</a></p>
						<p>bitcointalk - <a href="https://www.bitcointalk.org/ekashjoin">www.bitcointalk.com</a></p>
						<p>Github - <a href="https://www.github.com/ekashjoin">www.github.com</a></p>
					</div>
					<div class="col-md-4 col-sm-6 footer-third">
					<h3>Like Us on Facebook</h3>
					<iframe class="facebook-like-box" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Finovatik.web%2F&tabs&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=100446383638938" width="350" height="230" style="border:none;overflow:hidden;"></iframe>
					</div>
				</div>
			</div>
		</div> <!-- end of footer -->

		
		<!-- Footer Final -->
		<div id="footer-final">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>Spotlight Event Landing Page Template, Designed by <a href="#">Inovatik</a></p>
					</div>
				</div>
			</div>
		</div> <!-- end of footer final -->
		
		<a href="#" class="back-to-top">Back to Top</a>
	</div> <!-- end of main container -->
	
	
	<!-- Scripts -->
	<script src="/assets/ico/js/jquery-2.2.4.min.js"></script> <!-- JQuery 2.2.4 -->
	<script src="/assets/ico/js/bootstrap.min.js"></script> <!-- Bootstrap 3.3.7 -->
	<script src="/assets/ico/js/jquery.flexslider.js"></script> <!-- Flexslider Gallery Script -->
	<script src="/assets/ico/js/waypoints.min.js"></script> <!-- jQuery Waypoints v2.0.3 For Counter Up and Animations -->
	<script src="/assets/ico/js/jquery.countdown.min.js" type="text/javascript"></script> <!-- The Final Countdown v2.2.0 plugin for jQuery -->
	<script src="/assets/ico/js/scripts.js"></script> <!-- Custom Spotlight Scripts -->

</body>
</html>                                		