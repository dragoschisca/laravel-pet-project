<!DOCTYPE html>
<html>
<head>
    <title>Editare liga</title>
</head>
<body>
<h3>Editarea liga</h3>
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
@foreach($ligas as $x)
<form method="post" action="{{ url('liga/update/'.$x->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{$x->id}}">
<table>
        <tr>
            <td><input type="text" name="Nume" size="30" value="{{$x->Nume}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Tara" size="30" value="{{$x->Tara}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Nr_Echipe" size="30" value="{{$x->Nr_Echipe}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Lider" size="30" value="{{$x->Lider}}"></td>
        </tr>

        <tr>
        <td colspan="2"><input type="submit" value="Salveaza"></td>
        </tr>
</table>
@endforeach
</form>
</body>
</html>
