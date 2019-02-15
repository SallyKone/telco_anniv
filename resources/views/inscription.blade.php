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
	
	<div class="events-sections">
		<div class="container">
			
			<div class="">
				<div class="col-sm-4 live-grids-w3ls imgG">
					
					<div class="panel panel-primary">
						
						<div class="panel-body">

						<img class="imgDp" src="images/teaser.jpg">
							
						</div>
					</div>
				</div>

				<div class="col-sm-4 live-grids-w3ls">
					
					<div class="panel panel-primary">
						
						<div class="panel-body">
							
 @if(session('success'))
  <div class="alert alert-success">
    {{session('success')}} 
  </div>  
@endif
@if(session('error'))
  <div class="alert alert-error">
      {{session('error')}}
  </div>
@endif
@if(session('error'))
  <div class="alert alert-error">
      {{session('error')}}
  </div>
@endif
  @if(!$errors->isEmpty())
     <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       {{$error}}<br/>
     @endforeach
     </div>
   @endif

								  <form action="{{route('inscription')}}" method="POST" enctype="multipart/form-data">
								  	{{csrf_field()}}
								  <div class="form-group">
								    <label for="nom">Nom</label>
								    <input required="required" type="text" class="form-control" name="nom" id="nom"  placeholder="Nom">
								    
								  </div>
								  <div class="form-group">
								   <label for="prenom">Prénom</label>
								    <input required="required" type="text" class="form-control" name="prenom" id="prenom"  placeholder="Prénom">
								  </div>
								  <div class="form-group">
								   <label for="dateNaiss">Date de naissance</label>
								    <input required="required" type="date" class="form-control" name="dateNaiss" id="dateNaiss"  placeholder="Date de naissance">
								  </div>
								  <div class="form-group">
								   <label for="telephone">Telephone</label>
								    <input required="required" type="text" class="form-control" name="telephone" id="telephone"  placeholder="XXXXXXXX">
								  </div>
								  <div class="form-group">
								   <label for="login">Login</label>
								    <input required="required" type="text" class="form-control" name="login" id="login"  placeholder="Login">
								  </div>
								  <div class="form-group">
								   <label for="password">Password</label>
								    <input required="required" type="password" class="form-control" name="password" id="password"  placeholder="Password">
								  </div>
								  <div class="form-group">
								   <label for="photo">Photo</label>
								    <input required="required" type="file" class="form-control" name="photo" id="photo"  placeholder="Prénom">
								  </div>
								  <button type="submit" class="btn btn-primary" style="width: 26%;font-weight: bold;margin-left: 37%;margin-top: 4px;">Enregistrer</button>
								</form>
								

							
						</div>
					</div>
					
				</div>

				<div class="col-sm-4 live-grids-w3ls imgD">
					
					<div class="panel panel-primary">
						
						<div class="panel-body">
							<img class="imgDp" src="images/flow.jpg">
						</div>
					</div>
					
				</div>
			</div>	
			<div class="clearfix"> </div>
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
	<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
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
	<style type="text/css">
		@media all and (max-device-width: 740px) {
   
     .imgG div {display: none;}
     .imgD div {display: none;}
	}
	</style>

	<style type="text/css">
		.imgDp {
			height: 340px;
		    width: 100%; 
		}

		.forgotpassword{width:160px; height:30px;  font-size:13px; color:#000; line-height:30px;  margin:10px 0 0 0px; float:left;}
		.forgotpassword a{text-decoration:none; color:#000;}
		.forgotpassword a:hover{font-size:14px;}

		/*.submitbtn{width:100px; height:30px; font-size:15px; color:#fff; line-height:30px; text-align:cente; border:none; cursor:pointer; outline:none; margin:20px 15px 0 0px; text-transform:uppercase; float:right; border-radius:8px;*/

		.clear{clear:both;}
		/*.form{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 20px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}*/

		. h1 {
		    font-size: 20px;
		    color: #000;
		    text-align: center;
		    padding: 0 0 20px 10px;
		    margin: 0px;
		}

		.chaageform{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 10px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}
		.forme{
			
		    padding: 0.5em 1em;
		    font-size: .9em;
		    background: transparent;
		    border: 2px solid #2d2d2dad;
		    color: #080808;
		    border-radius: 14px;
		    width: 100%;
		    margin-top: 14px;
		}
		.submit{
			margin-bottom: 13%;

		}
	</style>
</body>

</html>