<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Bettering an Education Category Bootstrap Responsive Website Template | Contact :: w3layouts</title>
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
	<style type="text/css">
		.votretop{width:350px; height:auto; margin:0 auto 30px auto; position:relative;}
		.votretag{width:115px; height:auto; float:left; text-align:right; font-size:15px; line-height:25px;}
		.votredrop{width:116px; height:37px; padding:5px 10px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none; margin:0px 10px 10px 10px; overflow:hidden; float:left; background:#FFF; float:left;}
		.votredrop img{width:100%; float:right;}
		.dropp{width:200px; height:20px; outline:none; border:none; background:none !important; -web-kit-background:none !important}

		.downtag{width:300px; height:auto; font-size:15px; text-align:left; line-height:15px; border:solid 1px #000; margin:0 0 0 20px;}
		.downtag span{float:right;}
		.downtag p{padding:5px; margin:0px;}
		.downheading{width:300px; height:30px; background:#fd841e; border-bottom:solid 1px #000; font-size:20px; text-align:center; line-height:30px; margin:0 0 10px 0px;}
		.votreimg{width:5%; position:absolute; bottom:5px; left:-50px;}
		.votreimgg{width:5%; position:absolute; bottom:5px; right:-20px;}
		.imag{position: relative;width: 100%;}
		.colum-classement{
			width: 19.6%;
			position: relative;
			display: inline-block;
		}

	</style>
</head>

<body>
	<!--Header-->
	@include('header')
	
	<br/><br/>
	<div class="votretop">	
		<form action="monrang" method="post">
			{{csrf_field()}}
			<div class="votretag"><strong>Saisir Votre</strong></div>
			<div class="votredrop">
			    <input type="text" name="lecodecandidat" value=""  placeholder="Code de vote"  style="background:none; border:none;" required> 
			</div>
			<input type="submit" id="submit" value="Envoyer" class="contactsubbbtn" style="margin:0; float:left; font-size:12px; width:70px;" />
			<div class="clear"></div>
		</form>

		<div class="events-classe">
			<div class="container">			
				<div class="">
					<div class="colum-classement ">
						<center>
						<div class="panel panel-primary">
							<div class="panel-heading"><center>VOTRE CLASSEMENT</center></div>
							<div class="panel-body">
								<div class="row">
									{{isset($message)? $message : ""}}
									@if(isset($candidat))
									<div class="col-sm-12">
										<img class="imag" src="{{URL::asset('/images/img/avatar/'.$candidat->photo)}}">
									</div>
									<div class="col-sm-12">	
										<p>{{$candidat->nom.' '.$candidat->prenom}}</p>
										<p>Code: {{$candidat->codecandidat}}</p>
										<p>{{$candidat->voix}}er avec {{$candidat->voix}} voix</p>
									</div>
									@endif			
								</div>
								
							</div>
						</div>
						</center>				
					</div>		
				</div>	
				<div class="clearfix"> </div>
			</div>
		</div>
	</div><br><br><br><br>

	<div class="events-sectione">
		<div class="row">
			<div class="colum-classement">
				<div class="panel panel-primary">
					<div class="panel-heading"><center>TOP 10 D'AUJOURD'HUI</center></div>
					<div class="panel-body " style="height: 390px; overflow: hidden;">
						@foreach($classement0 as $classement)
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-sm-4">
								<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classement->photo)}}">
							</div>
							<div class="col-sm-8">	
								<p>{{$classement->nom.' '.$classement->prenom}}</p>
								<p>Code: {{$classement->codecandidat}}</p>
								<p style="color: red">{{$classement->voix}} voix</p>
							</div>
						</div>
						@endforeach
						<h5></h5>
					</div>
				</div>
				
			</div>

			<div class="colum-classement">
				<div class="panel panel-primary">
					<div class="panel-heading"><center>TOP 10 DU {{date("d-m-Y", strtoTime("1 day"))}}</center></div>
					<div class="panel-body " style="height: 390px; overflow: hidden;">
						@foreach($classement1 as $classement)
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-sm-4">
								<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classement->photo)}}">
							</div>
							<div class="col-sm-8">	
								<p>{{$classement->nom.' '.$classement->prenom}}</p>
								<p>Code: {{$classement->codecandidat}}</p>
								<p style="color: red">{{$classement->voix}} voix</p>
							</div>
						</div>
						@endforeach
						<h5></h5>
					</div>
				</div>
			</div>

			<div class="colum-classement">
				<div class="panel panel-primary">
					<div class="panel-heading" ><center>TOP 10 DU {{date("d-m-Y", strtoTime("2 day"))}}</center></div>
					<div class="panel-body " style="height: 390px; overflow: hidden;">
						@foreach($classement2 as $classement)
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-sm-4">
								<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classement->photo)}}">
							</div>
							<div class="col-sm-8">	
								<p>{{$classement->nom.' '.$classement->prenom}}</p>
								<p>Code: {{$classement->codecandidat}}</p>
								<p style="color: red">{{$classement->voix}} voix</p>
							</div>
						</div>
						@endforeach
						<h5></h5>
					</div>
				</div>
			</div>

			<div class="colum-classement">
				<div class="panel panel-primary">
					<div class="panel-heading"><center>TOP 10 DU {{date("d-m-Y", strtoTime("3 day"))}}</center></div>
					<div class="panel-body " style="height: 390px; overflow: hidden;">
						@foreach($classement3 as $classement)
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-sm-4">
								<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classement->photo)}}">
							</div>
							<div class="col-sm-8">	
								<p>{{$classement->nom.' '.$classement->prenom}}</p>
								<p>Code: {{$classement->codecandidat}}</p>
								<p style="color: red">{{$classement->voix}} voix</p>
							</div>
						</div>
						@endforeach
						<h5></h5>
					</div>
				</div>
			</div>

			<div class="colum-classement">
				<div class="panel panel-primary">
					<div class="panel-heading"><center>TOP 10 DU {{date("d-m-Y", strtoTime("4 day"))}}</center></div>
					<div class="panel-body " style="height: 390px; overflow: hidden;">
						@foreach($classement4 as $classement)
						<div class="row" style="margin-bottom: 10px;">
							<div class="col-sm-4">
								<img class="imag" src="{{URL::asset('/images/img/avatar/'.$classement->photo)}}">
							</div>
							<div class="col-sm-8">	
								<p>{{$classement->nom.' '.$classement->prenom}}</p>
								<p>Code: {{$classement->codecandidat}}</p>
								<p style="color: red">{{$classement->voix}} voix</p>
							</div>
						</div>
						@endforeach
						<h5></h5>
					</div>
				</div>
			</div> 
		</div>	
		<div class="clearfix"> </div>
	</div>

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
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script>
	<!--// Bootstrap Js -->

	<!--// Required Scripts -->
</body>
</html>