<!DOCTYPE html>
<html>
<head>
	<title>Add antrenor</title>
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
			<td>Preume</td>
			<td><input type="text" name="Prenume"></td>
		</tr>
        <tr>
			<td>Certificare</td>
			<td><input type="text" name="Certificare"></td>
		</tr>
		<tr>
			<td>Club</td>
			<td><input type="text" name="Club"></td>
		</tr>
        <tr>
			<td>Varsta</td>
			<td><input type="text" name="Varsta"></td>
		</tr>
		<tr>
            <td>Imagine</td>
            <td><input type="file" name="Imagine"></td> 
		<tr>
			<td colspan="2"><input type="submit" value="Adauga antrenor"></td>
			
		</tr>
	</table>
</form>
</body>
</html>