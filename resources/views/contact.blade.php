<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mon incroyable anniversaire | Telco</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Bettering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- map -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJzgyR3Un04ndSCrm3Ac1goqPxd5U_HQw&callback=initMap" type="text/javascript"></script>
	<!-- fin map -->

	<!-- // Meta Tags -->
	<link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<!--testimonial flexslider-->
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
	<!--//fonts-->

</head>

<body>
	<!--Header-->
	 @include('header')
	<!--//Header-->
	<!-- contact -->
<section class="contact">
	<div class="container">
		<h3 class="title-txt"><span>N</span>ous Contacter </h3>
		<div class="contact-grids">
			 <!-- @if(session('success')) 
								{{-- ====================================================================================== --}}
								
									<div class="alert alert-success"> 
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
										{{ session('success') }} 
									</div> 
								@endif 
								@if(session('error')) 
									<div class="alert alert-danger"> 
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
										{{ session('error') }} 
									</div> 
								@endif 
								{{-- ====================================================================================== --}} --> 


			<div class=" col-md-5 contact-form">
			<h4 class="heading">Vos informations</h4>
				<form action="{{ route ('contact_path')}}" method="post">
					{{ csrf_field() }}
						<input type="text" name="nom" placeholder="Votre nom" required=""/>
						<input type="email" name="email" placeholder="Votre Email" required=""/>
						<input type="text" name="telephone" placeholder="Telephone" required=""/>
						<textarea name="msg" placeholder="Message" required=""></textarea>
						<br/>
						<br/>
						<div class="submit1">
							<input type="submit" value="Envoyer">
						</div>
				</form>
			</div>


			<div class=" col-md-7 map">
				<div id="conteneur">
			
				</div>
				<br>
				<div class="col-md-5 contact-grid1">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Adresse</p>
						<span>Riviera Palmeraie, Rond point ADO phcie St Moise.</span>
					</div>
				</div>
				<div class="col-md-4 contact-grid1">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Téléphone</p>
						<p><span> +225 22 46 72 66 </span></p>
						<span> +225 22 46 72 66 </span>
					</div>
				</div>
				<div class="col-md-3 contact-grid1">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Email</p>
						<a href="mailto:info@example.com">info@telco.com</a>
						<a href="mailto:info@example1.com">info@telcoanniv.com</a>
					</div>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>
<!-- //contact -->
	@include('footer')
	<!-- Required Scripts -->
	<!-- Common Js -->
	<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
	
	<!--// Common Js -->
	<!--search-bar-agileits-->
	<script src="{{URL::asset('js/main.js')}}"></script>
	<!--//search-bar-agileits-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{URL::asset('js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>

	<script>
	
			function initMap() {
			
			var uluru = {lat: 5.378038, lng: -3.968965};
			
			
			var map = new google.maps.Map(document.getElementById('conteneur'), {
			  zoom: 16,
			  center: uluru 
			});
			
			var marker = new google.maps.Marker({
			  position: uluru,//position du marqueur sur la carte
			  map: map,
			  // icon : "https://image.ibb.co/h3f688/position.png"//l'icon du markeur , l'icon doit être sur internet a une url donné.
			});
		  }
		  
		  initMap(); 
	
	</script>

	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script>
	<!--// Bootstrap Js -->

	<!--// Required Scripts -->
	<style type="text/css">
		#conteneur{
			
			height: 430px;
			width: 100%;
			
		}
		.navbar-default .navbar-nav>li>a:focus,
		.navbar-default .navbar-nav>li>a:hover {
			color: white;
			background-color: red;
		}
	</style>
</body>

</html>