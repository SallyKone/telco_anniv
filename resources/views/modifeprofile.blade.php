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
	<div class="top">
                <div class="container"> 
                <div class="col-md-9 top-left">
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Riviera Palmeraie,Rond point ADO phcie St Moise.</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> +(225) 22 46 72 66</li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@telco.com</a></li>
                    </ul>
                </div>
                <div class="col-md-3 top-middle">
                    <ul>
                        <li><a href="https://web.facebook.com/monincroyableanniv/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--top-bar-w3layouts-->
        <div class="top-bar-w3layouts" style="margin-top: -15px;margin-bottom: -50px;">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index"><img  style="margin-top: 10px" src="images/telco.png"></a>
                    </div>
                    <!-- navbar-header -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <a id="lastli" href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a style="font-family: Roboto Slab;" href="index" class="active">Accueil</a></li>
                            <li><a style="font-family: Roboto Slab;" href="{{session()->has('idcandidat') ? 'profil':'connexion' }}" class="active">Profil</a></li>
                            <li><a style="font-family: Roboto Slab;" href="description" class="active">Description</a></li>
                            <li><a style="font-family: Roboto Slab;" href="contact" class="active">Contact</a></li> 
                            <li style="font-family: Roboto Slab;" id="lastli1"><a href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a></li> 
                        </ul>
                        
                    </div>
                    <div class="search-bar-agileits">
                        <div class="cd-main-header" id="lastli">
                            <!-- cd-header-buttons -->
                        </div>
                        <!-- <div id="cd-search" class="cd-search">
                            <form action="#" method="post">
                                <input name="Search" type="search" placeholder="Click enter after typing...">
                            </form>
                        </div> -->
                    </div>
                    <div class="clearfix"> </div>
                </nav>
            </div>

        </div>
	
	<!-- team -->
	
<section class="login">
    <div class="container">
        <div class="row login-grids">
            <div class=" col-md-8  offset-md-1 login-form">
                <div class="row">
                    @if(isset($statut))
                   <div class=" {{isset($statut) && $statut ? 'alert alert-success' : 'alert alert-danger'}}"> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> 
                    {{ $message }} 
                    </div> 
                    @endif
                    <form action="{{route('modifeprofile')}} " method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}             
    				    <div class="col-md-4 imgPhoto">
                            <div id="divavatar">
                                <img id="blah" src="{{URL::asset('/images/img/avatar/'.$candidat->photo)}}" alt="Votre image">
                            </div>
                            <br><br>
                            <input type="file" id="imgInp"  name="photo">
                        </div>
                        <div class="col-md-8 saisiForm">
                        
                            <div class="row">
                                <label class="col-md-4"><strong>Nom: </strong></label>
                                <input class="col-md-7" type="text" value="{{$candidat['nom']}}" required name="nom">
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-4"><strong>Prénons: </strong></label>
                                <input class="col-md-7" type="text" value="{{$candidat['prenom']}}" required name="prenom">
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-4"><strong>Né(e) le: </strong></label>
                                <select class="col-md-2" name="jour" id="Date" class="inqdropp" required>
                                    <option value="">Jour</option>
                                        @for($i=1;$i <= 31;$i++)
                                            <option {{(int)$candidat['jour_naiss'] == $i? "selected":""}} value="{{$i}}">{{$i}}
                                            </option>
                                        @endfor 
                                </select>
                                <select class="col-md-2" name="mois" id="Month" class="inqdropp" required>
                                    <option value="">Mois</option>
                                    <option {{(int)$candidat['mois_naiss'] == 1 ? "selected":""}} value="1">Janvier</option>
                                    <option {{(int)$candidat['mois_naiss'] == 2 ? "selected":""}} value="2">Fevrier</option>
                                    <option {{(int)$candidat['mois_naiss'] == 3 ? "selected":""}} value="3">Mars</option>
                                    <option {{(int)$candidat['mois_naiss'] == 4 ? "selected":""}} value="4">Avril</option>
                                    <option {{(int)$candidat['mois_naiss'] == 5 ? "selected":""}} value="5">Mai</option>
                                    <option {{(int)$candidat['mois_naiss'] == 6 ? "selected":""}} value="6">Juin</option>
                                    <option {{(int)$candidat['mois_naiss'] == 7 ? "selected":""}} value="7">Juillet</option>
                                    <option {{(int)$candidat['mois_naiss'] == 8 ? "selected":""}} value="8">Aout</option>
                                    <option {{(int)$candidat['mois_naiss'] == 9 ? "selected":""}} value="9">Septembre</option>
                                    <option {{(int)$candidat['mois_naiss'] == 10 ? "selected":""}} value="10">Octobre</option>
                                    <option {{(int)$candidat['mois_naiss'] == 11 ? "selected":""}} value="11">Novembre</option>
                                    <option {{(int)$candidat['mois_naiss'] == 12 ? "selected":""}} value="12">Decembre</option>
                                </select>
                                <select class="col-md-3" name="annee" id="year" class="inqdropp" required >
                                    <option value="0">Annee</option>
                                     @for($i=0;$i<100;$i++)
                                        <option value="{{1950+$i}}">{{1950+$i}}</option>
                                    @endfor 
                                </select>
                            </div>
                            <br>
                            <div class="row">
                                <label class="col-md-4"><strong>Téléphone: </strong></label>
                                <input class="col-md-7" type="text"  value="{{$candidat['numero']}}" required name="numero">
                            </div>
                            <br>
                            <div class="clear"></div>
                            <div class="submit1">
                                <input type="submit" value="Enregister">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			<div class="col-md-3 dash">
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
    <!-- upload file -->
    <script type='text/javascript'>
        
             function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
    
        $("#imgInp").change(function(){
            readURL(this);
        }); 
   </script>
    <!-- upload file -->
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
        @media all and (max-device-width: 740px) 
        {
            .dash{
                display: inline-block;
                margin-left: 59px;

             }
             .login-form{
                margin-left: 1px;
             }
             .imgPhoto  {
                width:auto;
                float: left;

                        }
             .saisiForm {
                width: 100%;
                float: left;
             }
             
        }
    </style>

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
.dash li a{font-size:20px; color:#000; padding:10px 0px; text-decoration:none; line-height:40px;}
.dash ul{margin-top:59px; padding:0px;}
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
.navbar-default .navbar-nav>li>a:focus,
        .navbar-default .navbar-nav>li>a:hover {
        color: white;
        background-color: red;
}
.submit1{
    margin-left: -23%;
    }


	</style>
</body>

</html>