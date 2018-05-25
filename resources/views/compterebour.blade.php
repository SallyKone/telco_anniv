<?php define("JOUR_",86400);?>
<!DOCTYPE html>
<html>
<head>
	<title>Telco</title>
	<style type="text/css">
		body{
			margin: 0;
			max-width: 100%;
			max-height: 100%;
		}
		#rideau{
			position: absolute;
			background-color: rgba(0,0,0,0.5);
			width: 100%;
			height: 100%;
		}
		#lavideo{
			background-color: rgba(3,4,53,1);
			position: fixed;
			width: 100%;
			height: 100%;
		}
		.compteur{
			background-color: rgba(255,255,255,0);
			width: 30%;
			text-align: center;
			padding: 1% 0;
			top: 1%;
		}
		#compteur1{
			position: absolute;
			margin-left: 5%;
		}
		#compteur2{
			position: absolute;
			margin-left: 65%;
		}
		.unites{
			background-color: rgba(255,255,255,0.5);
			border-radius: 30%;
			width: 20%;
			margin: 0 2px;
			border: solid 1px rgba(0,0,0,0.6);
			display: inline-block;
			text-align: center;
			font-family: fantasy;
		}
		.unites>p{
			font-weight:bold;
			color: rgba(23,44,153,1); 
		}
		@media{

		}
	</style>
</head>
<body>
	<video autoplay loop id="lavideo">
    	<source src="videos/comptarebour.mp4" type="video/mp4">
    </video>
	<div id="rideau"></div>
	<!--Compteur  -->
	<div id="compteur1" class="compteur">
		<div class="unites">
			<h1 class="jour">{{ isset($letemps) ? round($letemps/JOUR_) : "" }}</h1>
			<p>jours</p>
		</div>
		<div class="unites">
			<h1 class="heure">{{ isset($letemps) ? round(($letemps%JOUR_)/3600) : "" }}</h1>
			<p>heures</p>
		</div>		
		<div class="unites">
			<h1 class="minute">{{ isset($letemps) ? round((($letemps%JOUR_)%3600)/60) : "" }}</h1>
			<p>minutes</p>
		</div>
		<div class="unites">
			<h1 class="second">{{ isset($letemps) ? (($letemps%JOUR_)%3600)%60 : "" }}</h1>
			<p>secondes</p>
		</div>
	</div>
	<!--Compteur 2  -->
	<div id="compteur2" class="compteur">
		<div class="unites">
			<h1 class="jour">{{ isset($letemps) ? round($letemps/JOUR_) : "" }}</h1>
			<p>jours</p>
		</div>
		<div class="unites">
			<h1 class="heure">{{ isset($letemps) ? round(($letemps%JOUR_)/3600) : "" }}</h1>
			<p>heures</p>
		</div>		
		<div class="unites">
			<h1 class="minute">{{ isset($letemps) ? round((($letemps%JOUR_)%3600)/60) : "" }}</h1>
			<p>minutes</p>
		</div>
		<div class="unites">
			<h1 class="second" ="second">{{ isset($letemps) ? (($letemps%JOUR_)%3600)%60 : "" }}</h1>
			<p>secondes</p>
		</div>
	</div>

	<input type="hidden" id="temps" {{ isset($letemps) ? "value=$letemps" : "value=0"}}>
	<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var jour,heure,minute,second,lete,temps;
			temps = parseInt($("input#temps").val(),10);
			console.log('le temps : '+temps);
			
			function Compter(){
				temps-- ;
				jour = (Math.round(temps/86400));
				heure = (Math.round((temps%86400)/3600));
				minute = (Math.round(((temps%86400)%3600)/60))
				second = (((temps%86400)%3600)%60);
				
				$(".jour").text(jour<10 ? '0'+jour:jour);
				$(".heure").text(heure<10 ? '0'+heure:heure);
				$(".minute").text(minute<10 ? '0'+minute:minute);
				$(".second").text(second<10 ? '0'+second:second);
			}
			lete = setInterval(Compter,1000);
		});
	</script>
</body>
</html>
