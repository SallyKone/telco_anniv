<nav class="navbar navbar-dark" style="background-color: #1e3953;">
      <a class="navbar-brand" style="color:gold;font-weight: bold;"><i class="fa fa-gift"></i>&nbsp<i class="fa fa-gift"></i>&nbsp; Incroyable Anniversaire &nbsp;<i class="fa fa-gift"></i>&nbsp<i class="fa fa-gift"></i></a>
      <form class="form-inline">

	@if(session()->has('idcandidat'))
         <a href="/deconnexion" role="button" class="btn btn-outline-success">Déconnexion
        </a>
	@else
	<a href="/connexion" role="button" class="btn btn-outline-success">Connexion
        </a>&nbsp;&nbsp;
	<a href="/inscription" role="button" class="btn btn-outline-success">Inscription
        </a>
	@endif
      </form>
</nav>

							
