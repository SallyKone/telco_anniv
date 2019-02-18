
		<div class="header">
			<div class="top">
				<div class="container" style="height: 50px">	
				<div class="col-md-9 top-left">
					
						<MARQUEE BEHAVIOR="alternate" >
						 <img style="margin-top: -15px;" src="{{URL::asset('/images/header.png')}}"> 
						<!-- MON INCROYABLE ANNIVERSAIRE Désormais n'offrez plus de cadeau, VOTEZ --> 
						</MARQUEE>
				</div>
				<div class="col-md-3 top-middle">
					<ul>
						<li><a href="{{session()->has('idcandidat') ? 'deconnexion':'connexion' }}" class="btn btn-primary btn-md" role="button" title="Lien">{{session()->has('idcandidat') ? 'Déconnexion':'Connexion' }}
							</a></li>
							@if(!session()->has('idcandidat'))
							<li>
							<a  href="{{Route('frm-inscription')}}" title="Lien" class="btn btn-primary btn-md" role="button">{{session()->has('idcandidat') ? '':'Inscription' }}
							</a>
							</li>
							@endif
						
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--top-bar-w3layouts-->
		<div class="top-bar-w3layouts" style="margin-top: -15px;margin-bottom: -50px;">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header" name="imgTelco">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="imgTelco">
							<a href="index" ><img  style="margin-top: 10px; width: 19%;" src="images/teee.png">
							</a>
						</div>
						
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
							<div class="aplus">	
								<img style="margin-top: 10px;width:10%; float: right;margin-right:0px;" src="images/aaaaa.png">								
							</div>
							
						<ul class="nav navbar-nav navbar-right">
							<li><a style="font-family: Roboto Slab;" href="index" class="active">Accueil</a></li>
							<li><a style="font-family: Roboto Slab;" href="{{session()->has('idcandidat') ? 'profil':'connexion' }}"class="active" class="active">Profil</a></li>
							<li><a style="font-family: Roboto Slab;" href="description" class="active">Description</a></li>
							<li><a style="font-family: Roboto Slab;" href="contact" class="active">Contact</a></li>	
							<li><a style="font-family: Roboto Slab;" href="classement" class="active">Classement</a></li>	
								
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
	
		<!-- //Modal1 -->
	<!--//Slider-->
	</div>
	<style type="text/css">
		@media all and (max-device-width: 360) {
     
     .aplus img 
            {
                display: none;
             }
      .imgTelco
             {
             	width:32%;
             }        

	}
	a:active{color:red;}
	.img{
		width: 26%;
		float: right;
	}
	.img1{
	width: 9%;
	}
	.img2{
		width: 8%;
	}
	.img3{
		width: 9%

	}
	</style>
	
