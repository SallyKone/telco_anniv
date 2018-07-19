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

<section class="login">
	<div class="container">
		<div class="login-grids">
			<div class=" col-md-7 .offset-md-1 login-form">
				@if(isset($statut))
                <div class=" {{isset($statut) && $statut ? 'alert alert-success' : 'alert alert-danger'}}"> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                {{ $message }} 
                </div> 
                @endif

				<form class="commentForm" action="ajouteramis" method="post">
				{{csrf_field()}}
					<div class="myprofilemain" id="last">
						<div class="" id="last">
							@if($ami->id != null)
							<center><h3>Modifier un ami</h3></center>
							@else
							<center><h3>Ajouter un ami</h3></center>
							@endif
						</div><br><br>
 						<div class="clear"></div>
 
						<div class="row">
                            <label class="col-md-4"><strong>Pseudo/Nom: </strong></label>
                            <input class="col-md-7" type="text" value="{{isset($ami->nom)?$ami->nom:'Mon ami'}}" required name="nom">
                        </div><br>
                        <div class="row">
                            <label class="col-md-4"><strong>Numero Mobile: </strong></label>
                            <input class="col-md-7" type="text" value="{{$ami->numero}}" required name="numero">
                        </div><br>
 						<div class="clear"></div><br>
 						<input type="hidden" name="id" value="{{$ami->id}}">
 						<input type="submit" id="submit" name="" value="{{$ami->id !=null?'Modifier':'Ajouter'}}"  />
           			</div>
				</form>			
			</div>
			<div class=" col-md-4 dash "  >
				<ul>
					<li><a href="profil">Mon profile</a></li>
					<li><a href="modifeprofile">Modifier mon profile</a></li>
					<li><a href="ajouteramis" >Ajouter ami(s)</a></li>
					<li><a href="listeamis">Liste d'amis</a></li>
					<!--<li><a href="#">Numeros inconnus</a></li>-->
				</ul>	
		    	<div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>


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
	<style type="text/css">
		 .imgDp {
	height: 340px;
    width: 310PX; 
}

.clear{clear:both;}

.myprofilemain{width:495px; height:auto; float:left;}

.monprofilemain{width:95%; height:auto; margin:0 auto; }
.monprofilelogin{width:95%; height:auto; padding:10px; margin:0px; float:none;}
.monprofilelogin img{display:none;}

.afterlogin{width:720px; height:auto; border:solid 1px #999; border-radius:2px; padding:10px; background:#efeded; float:left; position:relative;}
.afterloginimg{width:5%; position:absolute; bottom:20px; right:5%;}

.photoedit{width:220px; height:280px; font-size:13px; color:#000; text-align:center; float:left;}
.photoedit img{width:80%; border:solid 1px #999; margin:10px 0 0 0px; background:#FFF;}
.photoedit a{text-decoration:underline; color:#000; text-align:left;}
.myprofile{width:240px; height:50px; font-size:15px; color:#000; text-align:left; line-height:50px; margin:0 5px 0 0px; float:left; }

.form{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 20px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}

. h1 {
    font-size: 20px;
    color: #000;
    text-align: center;
    padding: 0 0 20px 10px;
    margin: 0px;
}

.dash{width:220px; height:40px;  text-align:center !important; }
.dash ul{margin:0px; padding:0px;}
.dash ul li{list-style:none; display:block; margin:0 0 5px 0px;  background:#219b2f; border-radius:5px;}
.dash ul li a{font-size:20px; color:#000; padding:10px 0px; text-decoration:none; line-height:40px;}

.myprofile {
    width: 240px;
    height: 50px;
    font-size: 15px;
    color: #000;
    text-align: left;
    line-height: 50px;
    margin: 0 5px 0 0px;
    float: left;
}
.myprofileform{width:220px; height:17px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 15px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}
.myprofile#last{width:320px; height:50px; font-size:15px; color:#000; text-align:left; line-height:50px; margin:0 5px 0 0px; float:left;}

.changesubbtn{width:100px; height:30px; font-size:15px; color:#fff; line-height:30px; text-align:cente; border:none; cursor:pointer; outline:none; margin:10px 13px 0 0px; text-transform:uppercase; float:right; border-radius:8px;


	</style>
</body>

</html>