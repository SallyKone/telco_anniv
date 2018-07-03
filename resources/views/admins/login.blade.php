<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminTELCO-ANNIV | Connexion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="{{URL::asset('/dist/css/styles.css')}}" type="text/css">
  
</head>
<body class="body-connexion">
  <div class="bg-connexion"><img src="{{URL::asset('/dist/img/bg_login_admin.jpg')}}"></div>
  <div class="login-box col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-2 col-lg-4 col-md-4 col-sm-4 col-xs-8">
    <div class="entete-login"><span class="fa fa-lock" aria-hidden="true" style="color:white"></span>&nbsp; Connexion</div>
    <div class="field-box">
      <div class="ligne-input">
        <div class="input-group">
          <div class="input-group-addon login-addon">
            <span class="fa fa-user" aria-hidden="true" style="color:white"></span>
          </div>
          <input type="text" class="form-control opacite-input" id="login" placeholder="Login">
        </div>
      </div>
      <div class="ligne-input">
        <div class="input-group">
          <div class="input-group-addon login-addon">
            <i class="fas fa-key" style="color:white"></i>
          </div>
          <input type="password" class="form-control opacite-input" id="password" placeholder="Password">
        </div>
      </div>
      <div class="ligne-btn">
        <div class="mdp-oublie">
          Mot de passe ou identifiant oublié ? <a href="">Cliquez ici !</a>
        </div>
        <div class="btn-dlogin">
          <input type="button" value="Login" class="btn btn-primary">
        </div>
      </div>
    </div>
    <div class="creer-compte">
      Etes-vous enregistré(e) ? <a href="">Créer un compte !</a>
    </div>
  </div>
  <!-- /.login-box -->
<!-- jQuery -->
<script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('js/bootstrap.js')}}"></script>
<script type="text/javascript">
  $.ready();
</script>
</body>
</html>
