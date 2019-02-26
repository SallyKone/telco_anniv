@extends('partials/master')
@section('content')
<div class="row" style="margin-top:50px;">
  <div class="col-md-4 imG1" style="background-image:url(images/flow.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:279px;">
    
  </div>
  <div class="col-md-4" style="background-color: wheat;">
    <div id="montableau">
          <div class="form-group">
            <h2 style="color:black;text-align:center;"><label>Mon classement</label>
            </h2>
          </div>
          <div class="form-group">
            <input type="text" name="lecodecandidat" id="lecodecandidat" class="form-control" id="pwd" placeholder="Entrez votre code de vote">
          </div>
          <button type="submit" onclick="message()" class="btn btn-primary" style="margin-bottom:10px">Verifier</button>
    </div>
    
     <div class="card" style="">
          <h6 class="card-header" style="text-align:center;background-color:red;color:white">Votre classement</h6>
          <div class="card-body" style="">
            <p id="resultat" class="card-text" style="color:black"></p>      
          </div>
      </div> 
  </div> 
  <div class="col-md-4 imG1" style="background-image:url(images/flow.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:279px;">
    
  </div>
  
</div>
<div class="row">
  <div class="col-md"></div>
  <div class="col-md-2" style="margin-top: 20px;">
        <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" style="";><center>TOP 10 D'AUJOURD'HUI</center></div>
                
                <div class="panel-body actua" style="background-color: wheat;">
                   <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px">  
                    @foreach($classement0 as $classement)
                      <div class="card" style="margin-right: 15px;position: relative;width: 80%;display: inline-block;margin-bottom: 10px;margin-left:10%;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classement->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;"> 
                          </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height:136px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">
                            <div class="card-text" style="width: 100%;"> {{$classement->nom.' '.$classement->prenom}}  <br/>          
                                <font style="color:white">Code:</font>  <font style="color: gold;"> {{$classement->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classement->nbre_vote}} votes</center></font>
                            </div>
                              
                          </div>
                        </div>
                      </div>
                    @endforeach
                   </marquee> 
                
                </div>
            </div>
  </div>
  <div class="col-md-2" style="margin-top: 20px;">
      <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" style="";><center>TOP 10 DU {{date("d-m-Y", strtoTime("1 day"))}}</center></div>
                <div class="panel-body actua" style="background-color: wheat;">
                   <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px"> 

                  @foreach($classement1 as $classement)
                      <div class="card" style="margin-right: 15px;position: relative;width: 80%;display: inline-block;margin-bottom: 10px;margin-left:10%;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classement->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;"> 
                          </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height:136px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">
                                    
                            <div class="card-text" style="width: 100%;"> {{$classement->nom.' '.$classement->prenom}}  <br/>          
                                <font style="color:white">Code:</font>  <font style="color: gold;"> {{$classement->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classement->nbre_vote}} votes</center></font>
                            </div>
                              
                          </div>
                        </div>
                      </div>
                    @endforeach
                 </marquee> 
                
                </div>
            </div>
  </div>
  <div class="col-md-2 " style="margin-top: 20px;">
      <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" style="";><center>TOP 10 DU {{date("d-m-Y", strtoTime("2 day"))}}</center></div>
                <div class="panel-body actua" style="background-color: wheat;">
                    <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px"> 

                  @foreach($classement2 as $classement)
                      <div class="card" style="margin-right: 15px;position: relative;width:80%;display: inline-block;margin-bottom:10px;margin-left:10%;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classement->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;"> 
                          </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height:136px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">         
                            <div class="card-text" style="width: 100%;"> {{$classement->nom.' '.$classement->prenom}}  <br/>          
                                <font style="color:white">Code:</font>  <font style="color: gold;"> {{$classement->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classement->nbre_vote}} votes</center></font>
                            </div>
                              
                          </div>
                        </div>
                      </div>
                    @endforeach
                   
                  </marquee> 
                
                </div>
            </div>
  </div>
  <div class="col-md-2" style="margin-top: 20px;">
      <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" style="";><center>TOP 10 DU {{date("d-m-Y", strtoTime("3 day"))}}</center></div>
                <div class="panel-body actua" style="background-color: wheat;">
                  <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px"> 

                  @foreach($classement3 as $classement)
                      <div class="card" style="margin-right: 15px;position: relative;width:80%;display: inline-block;margin-bottom:10px;margin-left:10%">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classement->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;"> 
                          </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height:136px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">        
                            <div class="card-text" style="width: 100%;"> {{$classement->nom.' '.$classement->prenom}}  <br/>          
                                <font style="color:white">Code:</font>  <font style="color: gold;"> {{$classement->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classement->nbre_vote}} votes</center></font>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                   
                 </marquee>   
                
                </div>
            </div>
  </div>
  <div class="col-md-2" style="margin-top: 20px;">
        <div class="panel panel-primary" style="width:100%;">
                <div class="panel-heading" style="";><center>TOP 10 DU {{date("d-m-Y", strtoTime("4 day"))}}</center></div>
                <div class="panel-body actua" style="background-color: wheat;">
                   <marquee direction="up" onmouseout="this.start();" onmouseover="this.stop();" loop="infinite" height="300px">  
                    @foreach($classement4 as $classement)
                      <div class="card" style="margin-right: 15px;position: relative;width: 800%;display: inline-block;margin-bottom: 10px;margin-left:10%;">
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12" style="background-image: url(images/img/avatar/{{$classement->photo}}); background-repeat: no-repeat; background-position: center; background-size:100% 100%;height: 139px;"> 
                          </div>
                        </div>
                        <div class="row" style="margin-right: 0px; margin-left: 0px">
                          <div class="col-12 card-body" style="height:136px;padding: 0.25rem;background-color: #1e3953;color:#56f704;">          
                           <div class="card-text" style="width: 100%;"> {{$classement->nom.' '.$classement->prenom}}  <br/>          
                                <font style="color:white">Code:</font>  <font style="color: gold;"> {{$classement->codecandidat}} </font><br/>
                                     <font style="color: red;"><center>{{$classement->nbre_vote}} votes</center></font>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    
                   </marquee> 
                
                </div>
            </div>
  </div>
  
 <div class="col-md"></div>
</div>

@endsection
 <script type="text/javascript">

    function message()

    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("resultat").innerHTML = this.responseText;
          
        }
      };
      var montableau = document.getElementById("montableau");
     
        
      xhttp.open("GET", "/monrang/"+document.getElementById("lecodecandidat").value, true);
      xhttp.send();

    }
  </script> 
<style type="text/css">
  @media all and (max-device-width: 740px) {
   
 .imG1  {display: none;}
 .panel{
  width: 100%;
 } 
     }
</style>

