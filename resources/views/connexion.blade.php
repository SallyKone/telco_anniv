@extends('partials/master')
@section('content')
<div class="container" style="margin-top:5%; margin-bottom:5%;">
	
<div class="row">
  <div class="col-md-4" style="background-image:url(images/teaser.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:375px;">
    
  </div>
  <div class="col-md-4" style="background-color: wheat;">
@if(session('success'))
  <div class="alert alert-success">
    {{session('success')}} 
  </div>  
@endif
@if(session('error'))
<script>
	alert("erreur");
</script>
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
    <form action="/connexion" method="POST">
    	{{ csrf_field() }}
    	
    	<h3 style="text-align: center;">Acceder à mon compte</h3>
    	@if(isset($statut))
        	<div class=" {{isset($statut) && $statut ? 'alert alert-success' : 'alert alert-danger'}}"> 
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        {{ $message }}
		</div>
	@endif
		  <div class="form-group">
		    <label for="exampleInputEmail1">Identifiant/Login</label>
		    <input type="text" class="form-control" id="login" name="login" placeholder="Identifiant/Login">
		   
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Mot de passe</label>
		    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe">
		  </div>
		  <div class="form-group form-check">
		    
		    <label class="form-check-label" style="margin-left:-19px"><a href="mdpassoublier">Mot de passe oublié ?</a></label>
		    
		  </div>
		  <button type="submit" class="btn btn-primary" style="margin-left:35%;margin-bottom:18px">Connecter</button>
	</form>
	</div>
  <div class="col-md-4" style="background-image:url(images/flow.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:375px;">
    
  </div>
</div>
</div>
@endsection

