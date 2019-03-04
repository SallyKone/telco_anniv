@extends('partials/master')
@section('content')

<div class="row"">
  <div class="col-1"></div>
  <div class="col-10" style="background-color:#a7a1a1;margin-top: 5%;margin-bottom: 5%;">
    <div class="row">
      <div class="col-md-4" style="background-color: gray;">
        <div>
          <ul class="nav flex-column" style="width:65%;margin-left:17%;margin-bottom:5%;">
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
        <h4 style="text-align: center;margin-bottom: 5%;margin-top:3%;">
        La liste de mes ami(e)s</h4>
          <table id="table" class="display" style="width: 100%">
            <thead>
              <tr>
                <th style="text-align: center;">Nom</th>
                <th style="text-align: center;">Numéro</th>
                <th style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($listeamis as $ami)
              <tr>
                <td>{{$ami->nom}}</td>
                <td>{{$ami->numero}}</td>
                <td>
                  <a href="ajouteramis?id={{$ami->id}}" class="btn btn-sm btn-primary modifier">Modifier</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
      
