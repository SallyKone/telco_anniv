@extends('partials/master')
@section('content')
	<!-- team -->
	<div class="row">
		<div class="col-md"></div>
			<div class="col-md-6" style="margin-left:4%;margin-top:6%; background-color:wheat;margin-bottom: 19px;">
				<h4>Retrouver mon mot de passe</h4>
				<p>{{isset($statut)?$message : ""}}</p>
				<form action="mdpassoublier" method="POST">
				{{csrf_field()}}
						
					    <div class="form-group">
					      
					      <input required type="text" id="login" name="login" placeholder="Login" class="form-control" />
					    </div>
					    <div class="form-group">
					      
					     <input  required type="text" id="phone" name="phone" placeholder="Telephone" class="form-control" />
					    </div>
					  	<div class="form-group">
					   		<button type="submit" id="submit" value="Envoyer" class="btn btn-primary">Envoyer</button>
                        	
                    	</div>
				</form>
			</div>

		<div class="col-md"></div>	
	</div>

	<!-- //team -->

@endsection