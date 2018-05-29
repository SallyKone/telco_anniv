<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mon incroyable anniversaire| telco</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Bettering Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- // Meta Tags -->
	<link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
	<!--testimonial flexslider-->
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
	<!--//fonts-->

</head>

<body>
	<!--Header-->
	@include('header')
	
	<!-- team -->
	

<section class="login">
	<div class="container">
		
		<div class="login-grids">
			<div class=" col-md-7 .offset-md-1 login-form">
                @if(session('success')) 
                                {{-- ====================================================================================== --}}
                                
                                    <div class="alert alert-success"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        {{ session('success') }} 
                                    </div> 
                                @endif 
                                @if(session('error')) 
                                    <div class="alert alert-danger"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                                        {{ session('error') }} 
                                    </div> 
                                @endif 
                                {{-- ====================================================================================== --}}
			
				<div class="photoedit">
					<strong>Ajouter ma photo</strong>
			<form  action="" name="form1" id="form1" method="post" enctype="multipart/form-data" >
			<img src="" height="175"><br>
			<br>
			 <input name="MAX_FILE_SIZE" type="hidden" value="3000000" />
			<input type="file" id="changepic" style="width:0px; height:0px; background:none;" name="photo">
			<strong>Ajouter ma photo</strong>
			<br><br>
					
			</form>
            </div>
            
            <div class="col-md-3">

            <form action="{{route('savemodifeprofile')}} " method="post">
             {{ csrf_field() }} 
            <div class="myprofile" >	
            	<strong>Nom:</strong>
            </div>	
            <div class="myprofile">
                <input type="hidden" id="idcandidat" name="idcandidat" placeholder="" value="1" class="myprofileform" required />
            	<input type="text" id="name" name="nom" placeholder="" value="" class="myprofileform" required /><br>
            </div>
            	
            	
            	<div class="myprofile"><strong>Prénons:</strong>
            	</div>	
            	<div class="myprofile">	
            		<input type="text" id="name" name="prenom" placeholder="" value="" class="myprofileform" required />
            	</div>

            	<div class="myprofile"><strong>Né(e) le:</strong>
            	</div>	
            	<div class="myprofile">
<select name="jour" id="Date" class="inqdropp" required>
    
   <option value="0">Jour</option>
                  <option value="1" >1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        
    
    </select>
    </div>
    <div class="myprofile">
<select name="mois" id="Month" class="inqdropp" required>
    
   <option value="0">Mois</option>
        <option value="1">Janvier</option>
        <option value="2">Fevrier</option>
        <option value="3">Mars</option>
        <option value="4">Avril</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juillet</option>
        <option value="8">Aout</option>
        <option value="9">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Decembre</option>
        
    
    </select>
</div>
	<div class="myprofile">
<select name="Année" id="year" class="inqdropp" required>
    
   <option value="0">Annee</option>
        <option value="1">1980</option>
        <option value="2">1981</option>
        <option value="3">1982</option>
        <option value="4">1983</option>
        <option value="5">1984</option>
        <option value="6">1985</option>
        <option value="7">1986</option>
        <option value="8">1987</option>
        <option value="9">1988</option>
        <option value="10">1989</option>
        <option value="11">1990</option>
        <option value="12">1991</option>
        <option value="13">1992</option>
        <option value="14">1993</option>
        <option value="15">1994</option>
        <option value="16">1995</option>
        <option value="17">1996</option>
        <option value="18">1997</option>
        <option value="19">1998</option>
        <option value="20">1999</option>
        <option value="21">2000</option>
        <option value="22">2001</option>
        <option value="23">2002</option>
        <option value="24">2003</option>
        <option value="25">2004</option>
        <option value="26">2005</option>
        <option value="27">2006</option>
        <option value="28">2007</option>
        <option value="29">2008</option>
        <option value="30">2009</option>
        <option value="31">2010</option>
  </select>
</div>
<div class="clear"></div>
         		
            	<div class="myprofile"><strong>Téléphone:</strong>
            		</div>
            		<div>

            		<input type="text" id="name" name="telephone" placeholder="" value="" class="myprofileform" required /></div>


            		<div class="submit1">
						<input type="submit" value="Modifier">
					</div>
            	
            </form>
            </div>
            				
			</div>
				
		</div>
			<div class=" col-md-4 dash "  >
				<ul>
<li><a href="profil">Mon profile</a></li>
<li><a href="modifeprofile">Modifier mon profile</a></li>
<li><a href="ajouteramis" >Ajouter ami(s)</a></li>
<li><a href="listeamis">Liste d'amis</a></li>
<!--<li><a href="#">Numeros inconnus</a></li>-->
</ul>
				
		    <div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>


	<!-- //team -->

	@include('footer')
	<!-- Required Scripts -->
	<!-- Common Js -->
	<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
	<!--// Common Js -->
	<!--search-bar-agileits-->
	<script src="{{URL::asset('js/main.js')}}"></script>
	<!--//search-bar-agileits-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{URL::asset('js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- stats -->
	<script src="{{URL::asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{URL::asset('js/jquery.countup.js')}}"></script>
	<script>
		$('.counter-agileits-w3layouts').countUp();
	</script>
	<!-- //stats -->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script>
	<!--// Bootstrap Js -->

	<!--// Required Scripts -->
	<style type="text/css">
		 .imgDp {
	height: 340px;
    width: 310PX; 
}

.clear{clear:both;}

.myprofilemain{width:495px; height:auto; float:left;}

.monprofilemain{width:95%; height:auto; margin:0 auto; }
.monprofilelogin{width:95%; height:auto; padding:10px; margin:0px; float:none;}
.monprofilelogin img{display:none;}

.afterlogin{width:720px; height:auto; border:solid 1px #999; border-radius:2px; padding:10px; background:#efeded; float:left; position:relative;}
.afterloginimg{width:5%; position:absolute; bottom:20px; right:5%;}

.photoedit{width:220px; height:280px; font-size:13px; color:#000; text-align:center; float:left;}
.photoedit img{width:80%; border:solid 1px #999; margin:10px 0 0 0px; background:#FFF;}
.photoedit a{text-decoration:underline; color:#000; text-align:left;}
.myprofile{width:240px; height:50px; font-size:15px; color:#000; text-align:left; line-height:50px; margin:0 5px 0 0px; float:left; }

.form{width:280px; height:30px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 20px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}

. h1 {
    font-size: 20px;
    color: #000;
    text-align: center;
    padding: 0 0 20px 10px;
    margin: 0px;
}

.dash{width:220px; height:40px;  text-align:center !important; }
.dash ul{margin:0px; padding:0px;}
.dash ul li{list-style:none; display:block; margin:0 0 5px 0px;  background:#219b2f; border-radius:5px;}
.dash ul li a{font-size:20px; color:#000; padding:10px 0px; text-decoration:none; line-height:40px;}

.myprofile {
    width: 240px;
    height: 50px;
    font-size: 15px;
    color: #000;
    text-align: left;
    line-height: 50px;
    margin: 0 5px 0 0px;
    float: left;
}
.myprofileform{width:220px; height:17px;  font-size:15px; color:#999; line-height:30px; text-align:left; padding:10px;  margin:0 0 15px 0px; border-radius:10px; box-shadow:inset 0 0 10px #CCC; outline:none; border:none;}

	</style>
</body>

</html>