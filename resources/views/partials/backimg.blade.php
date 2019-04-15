<div class="row">
<div id="info_container" class="col-12">
		<div class="info"><b>Les votes à partir du 1er juin</b></div> 
		<div class="info">
		@if(!session()->has('idcandidat')) 
		  <span style="color:green"><b><a href="/inscription"><i>Inscrivez vous massivement !</i></a></b></span>
		@else
		  <span style="color:green"><b><i>Inscrivez vous massivement !</i></b></span>
		@endif
		</div>	
	</div>
</div>
<div class="row">
        <div class="col-12" style="background-image: url(images/CHAM.jpg); background-repeat: no-repeat; background-position: center; background-size: cover; width: 100%;height: 400px;"> 
        <div class="col-2">
          <img src="images/toout.png">
        </div> 
        </div> 
</div>


<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Roboto:300');

  #info_container {
  text-align:center;
  /*background:linear-gradient(141deg, #ccc 25%, #eee 40%, #ddd 55%);*/
  padding: 0px;
  background: orange;
  color:white;
  font-family:'Roboto';
  font-weight:bold;
  font-size:25px;
  overflow:hidden;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translate3d(0,0,0);
}

.info {
  display:inline-block;
  overflow:hidden;
  white-space:nowrap;
}

.info:first-of-type {    /* For increasing performance 
                       ID/Class should've been used. 
                       For a small demo 
                       it's okaish for now */
  animation: showup 7s infinite;
}

.info:last-of-type {
  width:0px;
  animation: reveal 7s infinite;
}

.info:last-of-type span {
  margin-left:-355px;
  animation: slidein 7s infinite;
}

@keyframes showup {
    0% {opacity:0;}
    20% {opacity:1;}
    80% {opacity:1;}
    100% {opacity:0;}
}

@keyframes slidein {
    0% { margin-left:-800px; }
    20% { margin-left:-800px; }
    35% { margin-left:0px; }
    100% { margin-left:0px; }
}

@keyframes reveal {
    0% {opacity:0;width:0px;}
    20% {opacity:1;width:0px;}
    30% {width:355px;}
    80% {opacity:1;}
    100% {opacity:0;width:355px;}
}
	</style>
