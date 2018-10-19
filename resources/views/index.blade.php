<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mon incroyable anniversaire | :: telco</title>
	<!-- Meta Tags -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="{{URL::asset('css/flexslider.css')}}" type="text/css" media="screen" property="" />
	<!--testimonial flexslider-->
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
	<!--//fonts-->
	<!--// Required Scripts -->
	<style type="text/css">
		#pourlavideo{ position: relative; z-index: 1;}
		#lavideo{position: absolute; top: 0;left: 0;width: 139%; height: 217%; z-index: 2;
			opacity: 0.3; overflow-x:hidden;}
		.pannel-body img {padding-right: 30px;}
		.img1 {padding-right: 15px;}
		.img2 {padding-right: 15px;	margin-left: 80px;}
		.panel-body h5 { font-size:17px; letter-spacing: 0.5px; color: #0c0c0c;
		    text-transform: uppercase; font-weight:700; text-align: center;}
		.panel-header {background-color: #1e3953; color:white; font-size: 17px;font-family: Arial, Helvetica, sans-serif; font-style: bold}
		.candilist{
			width: 185px;
			display: inline-block;
			position: relative;
			border: 1px solid black;
			padding: 1% 2%;
		} 
		.candilist-img{
			width: 100%;
			position: relative;

		}  
		.candilist-img >img{
			width: 100%;
			position: relative;
		}
		.lesdivlot{
			height: 400px;
			position: relative;
			overflow: hidden;
		}
		.lesdivlot div{
			position: relative;
		}
		.lesdivlot img{
			width: 90%;
		}
		#top10index{
			overflow-y: scroll;
		}
		.light-theme {
        color: #fff;
		}
		#canvasAnimation {
    position: relative;
    top: 0;
    left: 0;
    display: block;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: 50%;
    z-index: 0;
}
	</style>
</head>

<body class="light-theme animation-theme snow" id="canvasAnimation" width="1366" height="423">
	<!--Header-->
	@include('header')
		</div>
		</section><!-- end of slider section -->
		<div class="clearfix"> </div>
		<!-- //Modal1 -->
		<!--//Slider-->
	</div>
	<!--//Header-->
     <!--//Candidat-->
      
       <div class="container">
       	<div id="candidat">
       	 <div class="row">
       	 	<div class="col-sm-12" style="margin-top: -70px;">
       	 		<div class="panel panel-primary">
	       	 		<div class="panel-header"><center>LES CANDIDATS EN COMPETITION</center>
	       	 		</div>
       	 			<div class="panel-body">
	       	 			<marquee>
	       	 				@foreach($listecandidats as $candidat)
	       	 				<div class="candilist">
	       	 					<div class="candilist-img">
	       	 						<img class="imag" src="{{URL::asset('/images/img/avatar/'.$candidat->photo)}}">
	       	 					</div>
	       	 					<p>{{$candidat->nom.' '.$candidat->prenom}}</p>
								<p>Code de vote: {{$candidat->codecandidat}}</p>
	       	 				</div>
       	 					@endforeach
	                    </marquee>
       	 			</div>
	       	 	</div>
       	 	</div>
       	 </div>
       	 </div>
       </div>
      <!--//Candidat-->
	<!-- services -->
	<div class="w3-agile-services">
		<div class="container">
			<h3 class="title-txt"><span>S</span>ervices</h3>
		<div class="agileits-services">
				<div class="services-right-grids">
					
					
				<div class="col-sm-4  col-sm-offset-2 services-right-grid">
						<div class="se-top">
							<div class="services-icon">
								<a href="choixamis"><img src="images/midicon2.png"></a>
							
							</div>
							<div class="services-icon-info">
								</a><h5>AJOUT D'AMI(E)S</h5>
								<p>Ajouter vos ami(e)s gratuitement ici et augmenter vos chances d'être le vainqueur.</p>
							</div>
						</div>
					</div>


					
					<div class="col-sm-4 services-right-grid">
						<div class="se-top">
							<div class="services-icon">
								<a href="classement"><img src="images/midicon3.png"></a>
							<!-- <i class="fa fa-flask" aria-hidden="true"></i> -->
							</div>
							<div class="services-icon-info">
								<h5>CLASSEMENT</h5>
								<p>Suivez en direct sur notre site le classement des candidats en compétition.</p>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- //services -->
        
   <!-- news -->
	<div class="events-section">
		<div id="pourlavideo">
			  <!-- <video id="lavideo" loop autoplay>
				<source src="videos/video1.mp4" type="video/mp4">

			</video> -->  
			<div class="container">
				<h3 class="title-txt two"><span>A</span>ctualités</h3>
				<div class="row">
				<div class="col-md-4 live-grids-w3ls">
					<center>
					<div class="panel panel-primary lesdivlot">
						<div class="panel-header"><center>VAINQUEUR DU JOUR</center></div>
						<div class="panel-body">
							<div class="live-info">
							
							<img src="images/gagnant12.jpeg">
												
							</div>
							<h5>KOUAKOU Junior</h5>
						</div>
					</div>
					</center>				
				</div>

				<div class="col-md-4 live-grids-w3ls">
					<center>
					<div class="panel panel-primary lesdivlot">
						<div class="panel-header"><center>TOP 10 EN TETE</center></div>
						<div id="top10index" class="panel-body" style="height: 90%">
							<div class="live-info">
								<!-- <marquee style="" direction="up" height="213px"> -->
									@foreach($classement as $classemt)
										<div class="candilist" style="margin-bottom: 10px;">
											<div class="candilist-img" >
												<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classemt->photo)}}">
											</div>
											<div >	
												<p>{{$classemt->nom.' '.$classemt->prenom}}</p>
												<p>Code: {{$classemt->codecandidat}}</p>
												<p style="color: red">{{$classemt->voix}} voix</p>
											</div>
										</div>
									@endforeach
	                            <!-- </marquee> -->

	                            <div class="candilist" style="margin-bottom: 10px;">
									<div class="candilist-img" >
										<img class="imag" src="/images/img/avatar/defaut.png">
									</div>
									<div >	
										<p>Marc Durant</p>
										<p>Code: 23456</p>
										<p style="color: red">8 voix</p>
									</div>
								</div>
								<div class="candilist" style="margin-bottom: 10px;">
									<div class="candilist-img" >
										<img class="imag" src="/images/img/avatar/defaut.png">
									</div>
									<div >	
										<p>Marc Durant</p>
										<p>Code: 23456</p>
										<p style="color: red">8 voix</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</center>
				</div>

				<div class="col-md-4 live-grids-w3ls">
					<center>
					<div class="panel panel-primary lesdivlot">
						<div class="panel-header"><center>LOT EN JEU AUJOURD'HUI</center></div>
						<div class="panel-body">
							<div class="live-info">
								<img src="images/cadeaux/{{isset($anniversaire->photo)?$anniversaire->photo : 'defaut.jpg'}}">				
							</div>
							<h5>{{isset($anniversaire->libelle)?$anniversaire->libelle : 'Cadeau à venir'}}</h5>
						</div>
					</div>
					</center>
				</div>
				</div>
			</div>
			
		</div>
		<div class="clearfix"> </div>
		</div>
	</div>

	
	<!--//about-->
<!-- Testimonials -->
	<div class="testimonials">
		<div class="container">
			<h3 class="title-txt"><span>T</span>émoignages</h3>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/1.jpg" alt=" " style="height: 60%;" class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Regis GNONROU</h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipe de mon incroyable anniversaire, pour cette belle fête organisée en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors  faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/2.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Junior KOUAKOU</h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipe de mon incroyable anniversaire, pour cette belle fête organisée en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/1.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Regis GNONROU</h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipe de mon incroyable anniversaire, pour cette belle fête organisé en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors  faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Testimonials -->
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

	<!-- Banner Responsive slider -->
	<script src="{{URL::asset('js/responsiveslides.min.js')}}"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 3
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->

	<!-- flexSlider -->
	<script defer src="{{URL::asset('js/jquery.flexslider.js')}}"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->

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
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			console.log($("#top10index").children());
			setInterval(function(){
				$.ajax({
					url: '/indexajax', //construit l’url pour cette demande
		           	type: 'post',
		           	data: "",
		           	dataType: 'json',
		           	success: function (donnee) {
		           		console.log(JSON.stringify(donnee));
		           	},
		           	error: function (donnee) { 
		           		console.log('Erreur '+donnee);
		           	}
	    		});
	    	},1000*1200);
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->

 <script src="{{URL::asset('js/bootstrap.js')}}"></script>

</body>

</html>
