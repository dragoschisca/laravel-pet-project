<!DOCTYPE html>
<html>
<head>
	<title>Add stadion</title>
</head>
<body>
@if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif
<form method="post" action="store" enctype="multipart/form-data">
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
	<table>
		<tr>
			<td>Nume</td>
			<td><input type="text" name="Nume"></td>
		</tr>
		<tr>
			<td>Adresa</td>
			<td><input type="text" name="Adresa"></td>
		</tr>
		<tr>
			<td>Capacitate</td>
			<td><input type="text" name="Capacitate"></td>
		</tr>
        <tr>
			<td>Echipa</td>
			<td><input type="text" name="Echipa"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Adauga stadion"></td>
		</tr>
	</table>
</form>
</body>
</html>