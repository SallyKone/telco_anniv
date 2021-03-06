@extends('partials/master')
@section('content')

<div class="row"">
  <div class="col-1"></div>
  <div class="col-10" style="background-color:#a7a1a1;margin-top: 5%;">
    <div class="row">
      <div class="col-md-4" style="background-color: gray;">
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
                   <!--  <nav class="nav flex-column navbar-expand-lg navbar-light ">

                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: 13px;margin-bottom: 13px;">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style=" flex-basis:17%;">
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
	<center>                @if(session('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session('message')}} 
  </div>  
@endif
@if(!$errors->isEmpty())
     <div class="alert alert-danger">
     @foreach($errors->all() as $error)
       {{$error}}<br/>
     @endforeach
     </div>
   @endif
</center>
        <form class="commentForm" action="ajouteramis" method="post">
          {{csrf_field()}}
          <div class="" id="last">
                  @if($ami->id != null)
                  <center><h3 style="margin-bottom:5px">Modifier un(e) ami(e)</h3></center>
                  @else
                  <center><h3 style="margin-bottom:5px">Ajouter un(e) ami(e)</h3></center>
                  @endif
          </div>
          <div class="form-group">
          <label>Pseudo/Nom:</label>
                          <input type="text" class="form-control" value="{{$ami->nom}}" placeholder="Nom de votre ami(e)" required name="nom">
          </div>
          <div class="form-group">
            <label for="pwd">Numero Mobile: </label>
            <input type="number" placeholder="XXXXXXXX" class="form-control" value="{{$ami->numero}}" required name="numero">
          </div>
          <div class="form-group">
            <input type="hidden" name="id" value="{{$ami->id}}">
            <button type="submit" class="btn btn-success" value="{{$ami->id !=null?'Modifier':'Ajouter'}}" style="margin-left:18%">Ajouter</button>
            <button type="reset" class="btn btn-danger" style="margin-left:8%">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-1"></div>
</div>
    <style type="text/css">
        li:hover{
          background-color:gray;
          
        }
        
    </style>
@endsection
      
