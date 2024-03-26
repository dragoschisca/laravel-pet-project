<!DOCTYPE html>
<html>
<head>
    <title>Editare club</title>
</head>
<body>
<h3>Editarea club</h3>
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
@foreach($clubs as $x)
<form method="post" action="{{ url('club/update/'.$x->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<input type="hidden" name="id" value="{{$x->id}}">
<table>
        <tr>
            <td><input type="text" name="Nume" size="30" value="{{$x->Nume}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Jucatori" size="30" value="{{$x->Jucatori}}"></td>
        </tr>
        <tr>
            <td>
            <select name="Antrenor">
                <option value="{{$x->Antrenor}}" selected>{{$x->Antrenor}}</option>
                @foreach($antrenors as $z)
                <option value="{{$z->Nume}}">{{$z->Nume. ' ' .$z->Prenume}}</option>
                @endforeach
            </select>
            </td>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="Pret" size="30" value="{{$x->Pret}}"></td>
        </tr>
        <tr>
            <td>
                <img src="{{ asset('images/' . $x->Imagine) }}" alt="{{ $x->Nume }}" width="100px">
                <input type="file" name="Imagine">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Salveaza"></td>
        </tr>
</table>
@endforeach
</form>
</body>
</html>
