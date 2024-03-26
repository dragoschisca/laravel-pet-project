<!DOCTYPE html>
<html>
<head>
    <title>Add club</title>
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
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table>
        <tr>
            <td>Nume</td>
            <td><input type="text" name="Nume"></td>
        </tr>
        <tr>
            <td>Jucatori</td>
            <td><input type="text" name="Jucatori"></td>
        </tr>
        <tr>
            <td>Antrenor</td>
            <td>
                <select name="Antrenor">
                    @foreach($antrenors as $x)
                    <option value="{{$x->Nume}}">{{$x->Nume. ' ' .$x->Prenume}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Pret</td>
            <td><input type="text" name="Pret"></td>
        </tr>
		<tr>
            <td>Imagine</td>
            <td><input type="file" name="Imagine"></td> 
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Adauga club"></td>
        </tr>
    </table>
</form>
</body>
</html>
