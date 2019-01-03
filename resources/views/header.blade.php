
		<div class="header">
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
						<a href="index"><img src="images/telco.png"></a>
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<a id="lastli" href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index" class="active">Accueil</a></li>
							<li><a href="{{session()->has('idcandidat') ? 'profil':'connexion' }}" class="active">Profil</a></li>
							<li><a href="description" class="active">Description</a></li>
							<li><a href="contact" class="active">Contact</a></li>	
							<li id="lastli1"><a href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}</a></li>	
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
		<!--//top-bar-w3layouts-->
		<!--Slider-->
	<div class="container">
		<div class="row" style="padding: 19px;">
		    <div class="col-md-2 col-sm-2 col-lg-2 logopartenaire" style="margin-top: 35px">
						<div class="">
                        	<img src="images/logo/logomtn.jpeg">
                        </div>
                        <div class="">
                                <img src="images/logo/logotrace.png">
                        </div>
                        <div class="">
                                <img src="images/logo/logotourisme.jpg">
                        </div>
            </div>
		    <div class="col-md-8 col-sm-6 col-lg-8 ">
		    	<video poster="images/img/imgdelavideo.png" controls style="width: 100%;height:30%;margin-top: 41px;" autoplay="true">
		    		<source src="videos/videofinal.webm" type="video/webm">
		    		<source src="videos/videofinal.mp4" type="video/mp4">
		    	</video>
		    </div>
		    <div class="col-md-2 col-sm-2 col-lg-2 logoptenaire" style="margin-top: 35px">
						<div class="">
                                <img src="images/logo/logoorange.jpg">
                        </div>
						<div class="">
                                <img src="images/logo/logojumia.png">
                        </div>
            </div>
		</div>
	</div>
		<!-- //Modal1 -->
	<!--//Slider-->
	</div>
	<style type="text/css">
		@media all and (max-device-width: 480px) {
    .logopartenaire {width:70px;}
    .logopartenaire img {
        margin-top: 36px;
        }
     .logopartenaire div {display: none;}
     .logoptenaire div {display: none;}
	}
	</style>
