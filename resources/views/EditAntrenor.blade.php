<!DOCTYPE html>
<html>
<head>
    <title>Editare antrenor</title>
</head>
<body>
<h3>Editarea antrenor</h3>
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
@foreach($antrenors as $x)
<form method="post" action="{{ url('antrenor/update/'.$x->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<input type="hidden" name="id" value="{{$x->id}}">
<table>
    <tr>
        <td><input type="text" name="Nume" size="30" value="{{$x->Nume}}"></td>
    </tr>
    <tr>
        <td><input type="text" name="Prenume" size="30" value="{{$x->Prenume}}"></td>
    </tr>
    <tr>
        <td><input type="text" name="Certificare" size="30" value="{{$x->Certificare}}"></td>
    </tr>
    <tr>
        <td><input type="text" name="Club" size="30" value="{{$x->Club}}"></td>
    </tr>
    <tr>
        <td><input type="text" name="Varsta" size="30" value="{{$x->Varsta}}"></td>
    </tr>
    <tr>
        <td>
        <img src="{{ asset('images/' . $x->Imagine) }}" alt="{{ $x->Nume }} {{ $x->Prenume }}" width="100px">
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
