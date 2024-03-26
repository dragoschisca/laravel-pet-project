<!DOCTYPE html>
<html>
<head>
	<title>Add liga</title>
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
			<td>Tara</td>
			<td><input type="text" name="Tara"></td>
		</tr>
		<tr>
			<td>Nr echipe</td>
			<td><input type="text" name="Nr_Echipe"></td>
		</tr>
        <tr>
			<td>Lider</td>
			<td><input type="text" name="Lider"></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" value="Adauga liga"></td>
		</tr>
	</table>
</form>
</body>
</html>