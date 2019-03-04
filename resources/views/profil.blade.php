@extends('partials/master')
@section('content')

<div class="row"">
  <div class="col-1"></div>
  <div class="col-10" style="background-color:#a7a1a1;margin-top: 5%;">
    <div class="row">
      <div class="col-md-4" style="background-color: gray;">
        <div class="row">
          <div class="col-2"></div>
          <div style="background-image:url(images/img/avatar/{{$candidat->photo}});background-color: wheat;background-repeat: no-repeat;background-position: center; background-size:100% 100%;height:150px;border-radius: 90%;margin-top: 5px" class="col-8"></div>
          <div class="col-2"></div>
        </div> 
        <div>

              <ul class="nav flex-column" style="width:60%;margin-left: 21%;margin-bottom: 5%;">
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" style="margin-top:16px;margin-bottom: 5px;" href="profil">Mon profil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="modifeprofile" style="margin-bottom: 5px;">Modifier mon profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="ajouteramis" style="margin-bottom: 5px;">Ajouter ami(e)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item nav-link btn btn-dark" href="listeamis" style="margin-bottom: 5px;">Liste ami(e)</a>
                </li>
              </ul>
                    <!-- <nav class="nav flex-column navbar-expand-lg navbar-light ">
                      
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
        <form style="margin-top: 5px;color: white">
          <div class="form-group">
              <label >Nom:</label>
              <input type="text" class="form-control" readonly value="{{$candidat->nom}}">
          </div>
           <div class="form-group">
              <label >Prénom:</label>
              <input type="text" class="form-control" readonly value="{{$candidat->prenom}}">

          </div>
           <div class="form-group">
              <label >Né(e) le:</label>
              <input  type="text" class="form-control" readonly value="{{$candidat->jour_naiss.'-'.$candidat->mois_naiss}}">

          </div>
          <div class="form-group">
              <label >Téléphone:</label>
              <input type="text" class="form-control" readonly value="{{$candidat->numero}}">

          </div>
          <div class="form-group">
              <label >Login</label>
              <input type="text" class="form-control" readonly value="{{$candidat->login}}" >

          </div>
          <div class="form-group">
              <label >Code de vote</label>
              <input type="text" class="form-control" id="" readonly value="{{$candidat->codecandidat}}" >
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
