<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mon incroyable anniversaire| telco</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- // Meta Tags -->
	<link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	
	<!--testimonial flexslider-->
	<link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
	<pre>{{isset($message) ? $message : ""}}</pre>
	<form method="post" action="ajoutcandidat" style="margin: 100px 40%;">
		{{csrf_field()}}
        <fieldset style="width: 200px">
            <legend>Test d'envoi de sms</legend>
            <table>
                <tr><td>Réseau </td><td><input type="text" name="dest"></td></tr>
                <tr><td>Numéro </td><td><input type="text" name="source"></td></tr>
                <tr><td>Message </td><td><input type="text" name="msg"></td></tr>
                <tr><td colspan="2" style="text-align: right;"><input type="submit" value="Envoyer"></td></tr>
            </table>
        </fieldset>
    </form>
	<script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
</body>

</html>