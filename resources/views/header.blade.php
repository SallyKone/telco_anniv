		<div class="header">
			<div class="top">
				<div class="container">	
				<div class="col-md-9 top-left">
					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i>Riviera Palmeraie,Rond point ADO phcie St Moise.</li>
						<li><i class="fa fa-phone" aria-hidden="true"></i> +(225) 22 46 61 64</li>
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
		<div class="top-bar-w3layouts">
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
		<div class="banner">
			
		</div>
		
		<!-- //Modal1 -->
		<!--//Slider-->
	</div>
