<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{ isset($message) ? $message : ""}}
	<table>
		<tr>
			<td>Id</td>
			<td>Code</td>
		</tr>
		@foreach($candidats as $candidat)
		<tr>
			<td>{{$candidat->candidat}}</td>
			<td>{{$candidat->login}}</td>
		</tr>
		@endforeach
		<tr>
			<td>Id hors</td>
			<td>Code hors</td>
		</tr>
		@foreach($candidathors as $candidat)
		<tr>
			<td>{{$candidat->candidat}}</td>
			<td>{{$candidat->login}}</td>
		</tr>
		@endforeach
	</table>
	<form method="post" action="vuedetest">
		{{ csrf_field()}}
		<input type="submit" name="moi"> 
	</form>
</body>
</html>
