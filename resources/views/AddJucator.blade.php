<!DOCTYPE html>
<html>
<head>
    <title>Add jucator</title>
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
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table>
        <tr>
            <td>Nume</td>
            <td><input type="text" name="Nume"></td>
        </tr>
        <tr>
            <td>Prenume</td>
            <td><input type="text" name="Prenume"></td>
        </tr>
        <tr>
            <td>Pozitia</td>
            <td>
                <select name="Pozitia">
                    <option value="Portar">Portar</option>
                    <option value="Fundas">Fundas</option>
                    <option value="Mijlocas">Mijlocas</option>
                    <option value="Atacant">Atacant</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Club</td>
            <td>
                <select name="Club">
                    @foreach($clubs as $x)
                    <option value="{{$x->Nume}}">{{$x->Nume}}</option>
                    @endforeach
                </select>
            </td>        </tr>
        <tr>
            <td>Varsta</td>
            <td><input type="text" name="Varsta"></td>
        </tr>
		<tr>
            <td>Imagine</td>
            <td><input type="file" name="Imagine"></td> 
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Adauga jucator"></td>
        </tr>
    </table>
</form>
</body>
</html>
