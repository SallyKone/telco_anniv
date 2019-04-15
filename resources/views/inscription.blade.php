@extends('partials/master')
@section('content')
<style type="text/css">
    	.bd-example-modal-lg .modal-dialog{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
  }
  
  .bd-example-modal-lg .modal-dialog .modal-content{
    background-color: transparent;
    border: none;
  }
    </style>

	<div class="container" style="margin-top:5%; margin-bottom:5%;">
		
		<div class="row">
<div class="col-md"></div>
<div class="col-md-6">
<center>		@if(session('success'))
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
   @endif</center>
</div>
<div class="col-md"></div>

</div>
<h3 style="text-align:center;color:white;margin-bottom: 17px;">INSCRIPTION CANDIDAT</h3>
		<div class="row">
			<div class="col-md"></div>

			<div class="col-md-6" style="background-image:url(images/teaser.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:670px;">
				<form action="{{route('inscription')}}" id="inscription" method="POST" enctype="multipart/form-data">
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
								    <input required="required" type="text" class="form-control" name="numero" id="numero" maxlength="8" placeholder="XXXXXXXX">
								  </div>
								  <div class="form-group">
								   <label for="login">Nom d'utilisateur</label>
								    <input required="required" type="text" class="form-control" name="login" id="login"  placeholder="Login">
								  </div>
								  <div class="form-group">
								   <label for="password">Password</label>
								    <input required="required" type="password" class="form-control" name="password" id="password"  placeholder="Password">
								  </div>
								  <div class="form-group">
								   <label for="photo">Photo</label>
								    <input required="required" type="file" class="form-control" name="photo" id="photo" accept="image/png, image/jpeg, image/bmp, image/jpg"  placeholder="Photo">
								  </div>
								  <button type="button" onclick="executer()" id="valider" class="btn btn-primary" style="width: 32%;font-weight: bold;margin-left: 36%;margin-top:0px;">Enregistrer</button>
						</form>
				
			</div>
			<div class="col-md"></div>
				
		</div>
			
	</div>				

<div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 48px">
            <span class="fa fa-spinner fa-spin fa-3x" style="color:yellow"></span>
        </div>
    </div>
</div>
<script>
	function close_modal() {
		$('.modal').model('hide');
	}
	function executer() {

		var taille = $('#photo')[0].files[0].size;

		if(taille >=5000000) {
			alert("La photo est trop grande. Veuillez choisir une photo de moins de 5 MB");
		}
		else {
			$('.modal').modal('show');
			$('#inscription').submit();
		}
		//console.log($('#photo').file[0].size);	
	}
</script>
@endsection


<style type="text/css">
	@media all and (max-device-width: 740px) {
   
 .imG1  {display: none;}
  
     }	
 .form-group label{
 	color: white;
 }    
</style>
