@extends('partials/master')
@section('content')

	<div class="container" style="margin-top:5%; margin-bottom:5%;">
		<h3 style="text-align:center;color:white;margin-bottom: 17px;">INSCRIPTION CANDIDAT</h3>
		<div class="row">
			<div class="col-md"></div>
			<div class="col-md-6" style="background-image:url(images/teaser.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:670px;">
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
								    <label for="nom" style="margin-top: 10px;">Nom</label>
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
								  <button type="submit" class="btn btn-primary" style="width: 32%;font-weight: bold;margin-left: 36%;margin-top:0px;">Enregistrer</button>
						</form>
				
			</div>
			<div class="col-md"></div>
				
		</div>
			
	</div>				
@endsection
<style type="text/css">
	@media all and (max-device-width: 740px) {
   
 .imG1  {display: none;}
  
     }	
 .form-group label{
 	color: white;
 }    
</style>
