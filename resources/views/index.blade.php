@extends('partials/master')
@section('content')
@include('partials/backimg')
      <div class="row" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-md-12 live-grids-w3ls" style="margin-top: 14px;">
            <div class="panel panel-primary">
                <div class="panel-heading" style="";>CANDIDAT(E)S EN COMPETITION</div>
                <div class="panel-body" style="background-color: wheat;height: 220px;">
                   <marquee direction="left" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite"> 
                    @foreach($listecandidats_votes as $candidat1)
                      <div class="card" style="width:210px;display: inline-block;position: relative;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                              <div class="col-12" style="background-image:url(images/img/avatar/{{$candidat1->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;">  </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height: 77px;padding: 0.25rem;background-color: #1e3953;color:#56f704">

                            <div class="card-text" style="width: 100%;"> 
                              @if(strlen($candidat1->nom.' '.$candidat1->prenom)>19)
                              {{substr($candidat1->nom.' '.$candidat1->prenom,0,19)."..."}}  
                              @else
                              {{$candidat1->nom.' '.$candidat1->prenom}}
                              @endif 
                              <br/>
                                    <font style="color:white;">Code de vote:</font> <font style="color: gold;">{{$candidat1->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$candidat1->nbre_vote}} votes</center></font>
                            </div>   
                            </div>
                        </div>
                      </div>
                    @endforeach 
                    @foreach($listecandidats_non_votes as $candidat2)
                      <div class="card" style="width:210px;display: inline-block;position: relative;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                              <div class="col-12" style="background-image: url(images/img/avatar/{{$candidat2->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;">  </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height: 77px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">

                            <div class="card-text" style="width: 100%;"> 
                              @if(strlen($candidat2->nom.' '.$candidat2->prenom)>19)
                              {{substr($candidat2->nom.' '.$candidat2->prenom,0,19)."..."}}  
                              @else
                              {{$candidat2->nom.' '.$candidat2->prenom}}
                              @endif<br/> 

                                   <font style="color:white">Code de vote:</font>  <font style="color: gold;"> {{$candidat2->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>0 votes</center></font>
                                   </div>   
                            </div>
                        </div>
                      </div>
                    @endforeach 
                   
                </marquee> 
                
              </div>
          
         </div>

        </div>
      </div>  
     
      <div class="row">
        <div class="col-12">
          <h1 style="text-align: center;margin-top: 20px;">Actualités</h1> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 live-grids-w3ls">
            <div class="panel panel-primary">
                <div class="panel-heading" style="">VAINQUEUR DU JOUR</div>
                <div class="panel-body actua" style="background-color: wheat;">
                  
                 <img src="images/daniel.jpg" style="height: 100%;width: 80%;margin-left:10%;">
                 
                </div>
                 <h5 style="text-align: center;color: white;font-weight: bold;background-color: #1d1d23;">KASSI FRANCK</h5>
                
            </div>
          
        </div>
        <div class="col-md-4 live-grids-w3ls">
            <div class="panel panel-primary">
                <div class="panel-heading" style="";>TOP 10 EN TETE</div>
                <div class="panel-body actua" style="background-color: wheat;">
                   <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px"> 
                  @foreach($classement as $classemt)
                  <div class="card" style="position: relative;width:70%;display: inline-block;margin-bottom: 10px;margin-left:15%;">
                    
                    <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classemt->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;">  </div>
                    </div>
                    <div class="row" style="margin-right: 0px; margin-left: 0px">
                      <div class="col-12 card-body" style="height:96px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">
                        <div class="card-text" style="width: 100%;"> 
                              {{$classemt->nom.' '.$classemt->prenom}}<br/>          
                                <font style="color:white">Code de vote:</font>  <font style="color: gold;"> {{$classemt->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classemt->nbre_vote}} votes</center></font>
                                   </div>
                          
                      </div>
                    </div>
                  </div>
                  @endforeach
                </marquee> 
                </div>
                <h5 style="text-align: center;color: white;font-weight: bold;background-color: #1d1d23;">{{date("d/m/Y")}}</h5>
            </div>
          
        </div>
        <div class="col-md-4 live-grids-w3ls" >
            <div class="panel panel-primary">
                <div class="panel-heading" style="">LOT EN JEU AUJOURD'HUI</div>
                <div class="panel-body actua" style="background-image: url(images/cadeaux/{{isset($anniversaire->photo)?$anniversaire->photo : 'defaut.png'}});background-color: wheat;"> 
                
                </div>
                <h5 style="text-align:center;color: white;font-weight: bold;background-color:#1d1d23;">{{isset($anniversaire->libelle)?$anniversaire->libelle : 'Cadeau à venir'}}</h5>
            </div>  
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h1 style="text-align: center;margin-top: 20px;">Témoignages</h1> 
        </div>
      </div>
      <div class="row">
       <div class="container mt-3">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-5 temoignage" style="background-image: url(images/missfina.JPG); "></div>
                    <div class="col-md"></div>
                    <div class="col-md-6"  style="">
                      <h4 style="text-align:center;color:red;margin-top:54px;font-weight: bold;">GNAPA Alice</h4>
                    <p style="margin-top:40px;font-weight: bold;">J’ai toujours voulu rendre le jour de mon anniversaire inoubliable! Grand merci à l’équipe de MON INCROYABLE ANNIVERSAIRE  d’avoir  organisé une émission de télé-réalité en  l’honneur  de mon anniversaire ! Non seulement  j’ai obtenu un superbe lot et en plus de tout cela je suis devenu une star de la télé-réalité ! Je suis dans la béatitude grâce à ce concours.</p>
                    </div>
                  </div>
                                
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-5 temoignage" style="background-image: url(images/jujutof.JPG);"></div>
                    <div class="col-md"></div>
                    <div class="col-md-6" style="">
                      <h4 style="text-align:center;color:red;margin-top:54px;font-weight: bold;">Junior KOUAKOU</h4>
                    <p style="margin-top:40px;font-weight: bold;">Un grand merci à toute l’équipe de mon incroyable anniversaire, pour cette belle fête organisée en mon honneur, en présence de tous mes amis, ma familles et pour ce merveilleux cadeau. Alors faite comme moi et devenez l’heureux gagnant du jour!!!.</p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-5 temoignage" style="background-image: url(images/candidate2.jpeg)";></div>
                    <div class="col-md"></div>
                    <div class="col-md-6"  style="">
                      <h4 style="text-align:center;color:red;margin-top:54px;font-weight: bold;">Sarah Audrey</h4>
                    <p style="margin-top:40px;font-weight: bold;">Merci à toute l’équipe de MON INCROYABLE ANNIVERSAIRE! je n’arrive toujours pas à croire que j’ai eu le privilège de célébrer la fête de mon anniversaire dans l’endroit de mes rêves ! C’est vraiment incroyable mais vrai.</p>
                    </div>
                  </div>
                </div>
              </div>             
            </div>

		</div>
        
      </div>
@endsection
