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
	<!-- Select2 -->
  	<link rel="stylesheet" href="{{URL::asset('plugins/select2/select2.min.css')}}">
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
				<div class="col-sm-4 live-grids-w3ls">
					<div class="panel panel-primary">	
						<div class="panel-body">
							<img class="imgDp" src="images/DES1.jpg">
						</div>
					</div>
				</div>

				<div class="col-sm-4 live-grids-w3ls">
					<div class="panel panel-primary">
						<div class="panel-body">
							<h3>Retrouver mon identifiant</h3>
							<br><p>{{isset($statut)?$message : ""}}</p>
							<form action="identifiantoublier" method="POST">
								<br>{{csrf_field()}}
								<input type="text" id="nom" name="nom" placeholder="Nom" class="form-control chaageform" />
								
								<input maxlength="8" required type="text" id="phone" name="phone" placeholder="Telephone"  class="form-control chaageform" /><br>
								<div class="">
									<label>Date naissance</label>
									<div class="row">
				                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				                        <select required name="jour" class="form-control select2" style="width: 100%;">
				                          <option value="">Jour</option>
				                          @for($i=1; $i <= 31; $i++)
				                            <option value="{{$i}}">{{$i< 10 ? '0'.$i : $i}}</option>
				                          @endfor
				                        </select>
				                      </div>
				                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				                        <select required name="mois" class="form-control select2" style="width: 100%;">
				                          <option value="">Mois</option>
				                          @for($j=1; $j <= 12; $j++)
				                            <option value="{{$j}}">{{$j< 10 ? '0'.$j : $j}}</option>
				                          @endfor
				                        </select>
				                      </div>
				                    </div>
   								</div>
								<div class="clear"></div><br><br/><br/><br/>
								<center>
								<input type="submit" id="submit" value="Envoyer" class="changesubbtn" />
								</center><br/>
								<div class="clear"></div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-4 live-grids-w3ls">
					
					<div class="panel panel-primary">
						
						<div class="panel-body">
							<img class="imgDp" src="images/REGIS.jpg">
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
	<!-- Select2 -->
	<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>

	<!--search-bar-agileits-->
	<script src="{{URL::asset('js/main.js')}}"></script>
	<!--//search-bar-agileits-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{URL::asset('js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/easing.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
			//Initialize Select2 Elements
    		$('.select2').select2();
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
    width: 100%; 
}

.chaageform{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 10px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}

.changesubbtn{width:100px; height:30px; font-size:15px; color:#fff; line-height:30px; text-align:cente; border:none; cursor:pointer; outline:none; margin:10px 13px 0 0px; text-transform:uppercase; float:right; border-radius:8px;

.inqdropmain{width:55px; height:18px; padding:10px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none; margin:10px 5px 0px 0px; overflow:hidden; float:left; background:#FFF;}

.inqdrop{width:140px; height:20px; outline:none; border:none; background:none !important;}

.clear{clear:both;}
.form{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 20px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}

. h1 {
    font-size: 20px;
    color: #000;
    text-align: center;
    padding: 0 0 20px 10px;
    margin: 0px;

	</style>
</body>

</html>