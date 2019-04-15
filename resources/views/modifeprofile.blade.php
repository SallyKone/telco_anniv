@extends('partials/master')
@section('content')
 <form action="{{route('modifeprofile')}} " method="post" enctype="multipart/form-data">
{{ csrf_field() }} 

<div class="row"">
  <div class="col-1"></div>
  <div class="col-10" style="background-color:#a7a1a1;margin-top: 5%;">
    <div class="row">
      <div class="col-md-4" style="background-color: gray;">
        <div class="row">
          <div class="col-2"></div>
          <div style="background-image:url(images/img/avatar/{{$candidat->photo}});background-color: wheat;background-repeat: no-repeat;background-position: center; background-size:100% 100%;height:150px;border-radius: 100%;margin-top: 5px" id="blah" class="col-8">
            <label class="custom-file-upload" title="Modifier votre photo">
                <input type="file" id="imgInp" name="photo" accept="image/png, image/jpeg, image/bmp, image/jpg"/>
                <i role="button" class="fa fa-camera"></i>
            </label>
          </div>
          <div class="col-2"></div>
        </div> 
       <div>
        <ul class="nav flex-column" style="width:65%;margin-left:17%;margin-bottom: 5%;">
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" style="margin-top:16px;margin-bottom: 5px;" href="profil">Mon profil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="modifeprofile" style="margin-bottom: 5px;">Modifier mon profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="ajouteramis" style="margin-bottom: 5px;">Ajouter ami(e)s</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="listeamis" style="margin-bottom: 5px;">Liste ami(e)s</a>
                </li>
              </ul>
          <!-- <nav class="nav flex-column navbar-expand-lg navbar-light ">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: 13px;margin-bottom: 13px;">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style=" flex-basis:25%;">
              <div class="col-md"></div>
              <div class="nav flex-column">
                <a class="nav-item nav-link btn btn-dark" style="margin-top:16px;margin-bottom: 5px;" href="profil">Mon profil<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link btn btn-dark" href="modifeprofile" style="margin-bottom: 5px;">Modifier mon profil</a>
                <a class="nav-item nav-link btn btn-dark" href="ajouteramis" style="margin-bottom: 5px;">Ajouter ami(e)</a>
                <a class="nav-item nav-link btn btn-dark" href="listeamis" style="margin-bottom: 5px;">Liste ami(e)</a>
              </div>
              <div class="col-md"></div>
            </div>
          </nav> -->
        </div>       
      </div>
      <div class="col-md-8">
                @if(isset($statut))
                   <div class=" {{isset($statut) && $statut ? 'alert alert-success' : 'alert alert-danger'}}"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    {{ $message }} 
                    </div> 
                @endif
		@if(session('error'))
  <div class="alert alert-danger">
      {{session('error')}}
  </div>
@endif
        <form style="margin-top: 5px;color: white">
          <div class="form-group">
              <label >Nom:</label>
              <input type="text" class="form-control" value="{{$candidat['nom']}}" required name="nom">
          </div>
           <div class="form-group">
              <label >Prénom:</label>
              <input type="text" class="form-control" value="{{$candidat['prenom']}}" required name="prenom"">

          </div>
           <div class="form-group">
              <label >Né(e) le:</label>
              @if($candidat->annee_naiss!=null)
                <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($candidat->annee_naiss.'-'.$candidat->mois_naiss.'-'.$candidat->jour_naiss))}}" required name="dateNaiss">
            @else
                <input type="date" class="form-control" value="{{date('Y-m-d', strtotime(date('Y').'-'.$candidat->mois_naiss.'-'.$candidat->jour_naiss))}}" required name="dateNaiss">
            @endif

          </div>
          <div class="form-group">
              <label >Téléphone:</label>
              <input type="text" class="form-control" value="{{$candidat['numero']}}" required name="numero">

          </div>
          <div class="form-group">
              <label >Login:</label>
              <input type="text" class="form-control" value="{{$candidat['login']}}" required name="login">

          </div>
          <div class="form-group">
              <label >Mot de passe:</label>
              <input type="text" class="form-control" value="{{$candidat['motpass']}}" required name="motpass">

          </div>
           <div class="form-group">
                <button type="submit" class="btn btn-success" style="margin-left:40%">Modifer</button>

           </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-1"></div>
</div>
</form>
<style type="text/css">
  input[type="file"] {
    display: none;
}

.custom-file-upload {
    margin-left: 45%;
    margin-top:140px; 
    cursor: pointer;
    display: inline-block;
    color: white;
}

</style>

<script type='text/javascript'>

  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').css('background-image', 'url("' + reader.result + '")');
        }

        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
      readURL(this);
  }); 
   </script>
   <style type="text/css">
        li:hover{
          background-color:gray;
          
        }
        
      </style>
@endsection
