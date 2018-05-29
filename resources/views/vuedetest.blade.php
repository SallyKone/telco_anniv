<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{ isset($resultat) ? $resultat : ""}}
	<form method="post" action="vuedetest">
		{{ csrf_field()}}
		<input type="submit" name="moi"> 
	</form>
</body>
</html>
