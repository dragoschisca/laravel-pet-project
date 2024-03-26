<!DOCTYPE html>
<html>
<head>
    <title>Editare stadion</title>
</head>
<body>
<h3>Editarea stadion</h3>
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
@foreach($stadions as $x)
<form method="post" action="{{ url('stadion/update/'.$x->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{$x->id}}">
<table>
        <tr>
            <td><input type="text" name="Nume" size="30" value="{{$x->Nume}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Adresa" size="30" value="{{$x->Adresa}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Capacitate" size="30" value="{{$x->Capacitate}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Echipa" size="30" value="{{$x->Echipa}}"></td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" value="Salveaza"></td>
        </tr>
</table>
@endforeach
</form>
</body>
</html>
