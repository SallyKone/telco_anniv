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
		.candilist{
			width: 250px;
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
	</style>
</head>

<body>
	<!--Header-->
	
	<div class="header">
		<div class="top">
			<div class="container">
				<div class="col-md-9 top-left">
					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>Riviera Palmeraie,Rond point ADO phcie St Moise.</li>
						<li><i class="fa fa-phone" aria-hidden="true"></i> +(225) 22 46 61 64</li>
						<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@telco.com</a></li>
					</ul>
				</div>
				<div class="col-md-3 top-middle">
					<ul>
						<li><a href="https://web.facebook.com/monincroyableanniv/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="/compterebour"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--top-bar-w3layouts-->
		<div class="top-bar-w3layouts">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="index"><img src="images/telco.png"></a>
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<a id="lastli" href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index" class="active">Accueil</a></li>
							<li><a href="{{session()->has('idcandidat') ? 'profil':'connexion' }}" class="active">Profil</a></li>
							<li><a href="description" class="active">Description</a></li>
							<li><a href="contact" class="active">Contact</a></li>
							<li id="lastli1"><a href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a></li>
						</ul>
					</div>

					<div class="search-bar-agileits">
						<div class="cd-main-header">
							<!-- cd-header-buttons -->
						</div>
						<!-- <div id="cd-search" class="cd-search">
							<form action="#" method="post">
								<input name="Search" type="search" placeholder="Click enter after typing...">
							</form>
						</div> -->
					</div>


					<div class="clearfix"> </div>
				</nav>
			</div>

		</div>
		<!--//top-bar-w3layouts-->
		<!--Slider-->
					<section class="slider" id="home">
				<div class="container-fluid">
					<div class="row">

					    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
							<div class="header-backup"></div>
					        <!-- Wrapper for slides -->
					        <div class="carousel-inner" role="listbox">
					            <div class="item active">
					            	<img src="images/slide1.jpg" alt="">
					                <div class="carousel-caption">
				               			
					                </div>
					            </div>
					            <div class="item">
					            	<img src="images/slide3.jpg" alt="">
					                <div class="carousel-caption">
				               			
					                </div>
					            </div>
					            <div class="item">
					            	<img src="images/slide4.jpg" alt="">
					                <div class="carousel-caption">
				               			
					                </div>
					            </div>
					            
					        </div>

					        <!-- Controls -->
					        
					        
					    </div>

					</div>
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
       	 	<div class="col-sm-12">
       	 		<div class="panel panel-primary">
	       	 		<div class="panel-heading"><center>LES CANDIDATS EN COMPETITION</center>
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
       	 					<!-- <img class="img1" src="images/candi1.jpg">
       	 					<img class="img1" src="images/candi2.jpg">
       	 					<img class="img1" src="images/candi3.jpg">
       	 					<img class="img1" src="images/candi4.jpg">
       	 					<img class="img1" src="images/candi5.jpg">
       	 					<img class="img1" src="images/candi1.jpg">
       	 					<img class="img1" src="images/candi2.jpg">
       	 					<img class="img1" src="images/candi3.jpg">
       	 					<img class="img1" src="images/candi4.jpg"> -->
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
								</a><h5>AJOUT D'AMIS</h5>
								<p>Ajouter vos amis gratuitement ici et augmenter vos chances d'être le vainqueurs.</p>
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
								<p>Suivez en direct sur notre site le classement des divers condidats en competition.</p>
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
					<div class="panel panel-primary">
						<div class="panel-heading"><center>VAINQUEUR DU JOUR</center></div>
						<div class="panel-body">
							<div class="live-info">
							
							<img width="100%" src="images/gagnant1.jpg">
												
							</div>
							<h5>Moris Bah</h5>
						</div>
					</div>
					</center>
					
				</div>

				<div class="col-md-4 live-grids-w3ls">
					<center>
					<div class="panel panel-primary">
						<div class="panel-heading"><center>TOP 10 EN TETE</center></div>
						<div class="panel-body">
							<div class="live-info">
								<marquee style="" direction="up" height="213px">
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
	                            </marquee>
							</div>
						</div>
					</div>
					</center>
				</div>

				<div class="col-md-4 live-grids-w3ls">
					<center>
					<div class="panel panel-primary">
						<div class="panel-heading"><center>LOT EN JEU AUJOURD'HUI</center></div>
						<div class="panel-body">
							<div class="live-info">
								<img width="100%" src="images/cadeaux/{{isset($anniversaire->photo)?$anniversaire->photo : 'defaut.jpg'}}">				
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
			<h3 class="title-txt"><span>T</span>emoignages</h3>
			<div class="col-md-6 testimonials-main">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/1.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Andy Brou</h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipes de mon incroyable anniversaire, pour cette belle fête organisé en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors  faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/2.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Bernard Tanoh</h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipes de mon incroyable anniversaire, pour cette belle fête organisé en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors  faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
									</div>
								</div>
							</li>
							<li>
								<div class="inner-testimonials-w3ls">
									<img src="images/3.jpg" alt=" " class="img-responsive" />
									<div class="testimonial-info-wthree">
										<h5>Alex Merphy </h5>
										<br>
										<p class="para-w3ls">Un grand merci à toute l’équipes de mon incroyable anniversaire, pour cette belle fête organisé en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors  faite comme moi et devenez l’heureux gagnant du jour !!!. </p>
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

 <script src="{{URL::asset('js/bootstrap.js')}}"></script>

</body>

</html>