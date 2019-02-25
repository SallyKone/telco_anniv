@extends('partials/master')
@section('content')
<div class="container" style="margin-top:5%; margin-bottom:5%;">
	
<div class="row">
  <div class="col-md-4" style="background-image:url(images/teaser.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:379px;">   
  </div>
  <div class="col-md-4" style="background-color: wheat;">
    <form  action="identifiantoublier" method="POST">
    	{{ csrf_field() }}
    	
    	<h3>Retrouver mon identifiant</h3>
		<br><p>{{isset($statut)?$message : ""}}</p>
    	
		  <div class="form-group"> 
		    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom"> 
		  </div>
		  <div class="form-group">
		    <input type="text" id="phone" name="phone" placeholder="Telephone" class="form-control">
		  </div>
		  <div class="form-group">
		    		<div class="">
								<label>Date naissance</label>
									<div class="row">
				                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				                        <select required name="jour" class="form-control select2" style="width: 100%;">
				                          <option value="">Jour</option>
				                          @for($i=1; $i <= 31; $i++)
				                            <option value="{{$i}}">{{$i< 10 ? '0'.$i : $i}}</option>
				                          @endfor
				                        </select>
				                      </div>
				                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				                        <select required name="mois" class="form-control select2" style="width: 100%;">
				                          <option value="">Mois</option>
				                          @for($j=1; $j <= 12; $j++)
				                            <option value="{{$j}}">{{$j< 10 ? '0'.$j : $j}}</option>
				                          @endfor
				                        </select>
				                      </div>
				                    </div>
   								</div>
		   
		  			</div>
		  <button type="submit" id="submit" class="btn btn-primary" style="margin-left:35%;margin-bottom:18px">Connecter</button>
	</form>
	</div>
  <div class="col-md-4" style="background-image:url(images/flow.jpg); background-color: wheat;background-repeat: no-repeat; background-position: center; background-size:100% 100%;height:379px;">
    
  </div>
</div>
</div>
@endsection


				