<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mon incroyable anniversaire| telco</title>
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
	
	<!-- team -->
	<div class="team">
		<div class="container">
			<center><img src="images/sms.png" height="600px" width="650px"></center>
   </div>
  </div>
	<div class="clearfix"> </div>
	</div>
</div>


	</div>
	<!-- //team -->

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
	<!-- stats -->
	<script src="{{URL::asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{URL::asset('js/jquery.countup.js')}}"></script>
	<script>
		$('.counter-agileits-w3layouts').countUp();
	</script>
	<!-- //stats -->
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
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script>
	<!--// Bootstrap Js -->

	<!--// Required Scripts -->
</body>

</html>