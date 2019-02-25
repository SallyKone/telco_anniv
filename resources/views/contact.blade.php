@extends('partials/master')
@section('content')
	<h1 class="title-txt" style="color: white;text-align:center;margin-top: 48px;"><span>N</span>ous Contacter </h1>
		<div class="row">
			<div class="col-md-5" style="padding: 4em 3em;background: #1e3953;">
					<div style="margin-top:-33px">
					<h3 style="text-align: center;color:white;">Vos informations</h3>
					</div>	
					<form action="{{ route ('contact_path')}}" method="POST" style="margin-top:24px">
				    	{{ csrf_field() }}
						  <div class="form-group">
						    
						    <input type="text" class="form-control" name="nom" placeholder=" Votre nom">
						   
						  </div>
						  <div class="form-group">
						   
						    <input type="email" class="form-control" name="email" placeholder="Votre email">
						  </div>
						  <div class="form-group">
						   
						    <input type="text" class="form-control" name="telephone" placeholder="Telephone">
						  </div>
						 
						  <div class="form-group">
						  	<textarea class="form-control" name="msg" rows="4" placeholder="Laissez nous un message"></textarea>
						  </div>
						  
						  <button type="submit" class="btn btn-primary" style="margin-left:35%;margin-top: 10%;">Envoyer</button>
					</form>
				
			</div>
			<div class="col-md-7 map">
				<div id="conteneur">
					
				</div>
				<!-- <div class="col-md-5 contact-grid1" style="position:relative;float:left;display:inline-block;">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Adresse</p>
						<span>Riviera Palmeraie, Rond point ADO phcie St Moise.</span>
					</div>
				</div>
				<div class="col-md-4 contact-grid1" style="position:relative;float:left;display:inline-block;">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Téléphone</p>
						<p><span> +225 22 46 72 66 </span></p>
						<p><span> +225 22 46 72 66 </span></p>
					</div>
				</div>
				<div class="col-md-3 contact-grid1" style="position:relative;float:left;display:inline-block;">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<div class="contact-right">
						<p>Email</p>
						<a href="mailto:info@example.com">info@telco.com</a>
						<a href="mailto:info@example1.com">info@telcoanniv.com</a>
					</div>
					
				</div> -->
			
			</div>
		</div>
		

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
	<style type="text/css">
		#conteneur{
			
			height: 549px;
			width: 100%;
			margin-top: 13px;
			
		}
		.navbar-default .navbar-nav>li>a:focus,
		.navbar-default .navbar-nav>li>a:hover {
			color: white;
			background-color: red;
		}
		.contact-right span, .contact-right a{
			font-size: 15px;
		    color: orange;
		    letter-spacing: 1px;
		    line-height: 26px;
		}
		.contact-grid1 i {
		    font-size: 25px;
		    color: #93c83f;
		    margin-bottom: 15px;
		}
		.contact-right p {
		    font-weight: 600;
		    font-size: 18px;
		    color: white;
		    margin-bottom: 5px;
		}
	</style>

@endsection


