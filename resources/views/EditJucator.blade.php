<!DOCTYPE html>
<html>
<head>
    <title>Editare jucator</title>
</head>
<body>
<h3>Editarea jucator</h3>
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
@foreach($jucators as $x)
<form method="post" action="{{ url('jucator/update/'.$x->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{$x->id}}">
<table>
        <tr>
            <td><input type="text" name="Nume" size="30" value="{{$x->Nume}}"></td>
        </tr>
        <tr>
            <td><input type="text" name="Prenume" size="30" value="{{$x->Prenume}}"></td>
        </tr>
        <tr>
            <td>
                <select name="Pozitia">
                    <option value="Portar" {{$x->Pozitia == 'Portar' ? 'selected' : ''}}>Portar</option>
                    <option value="Fundas" {{$x->Pozitia == 'Fundas' ? 'selected' : ''}}>Fundas</option>
                    <option value="Mijlocas" {{$x->Pozitia == 'Mijlocas' ? 'selected' : ''}}>Mijlocas</option>
                    <option value="Atacant" {{$x->Pozitia == 'Atacant' ? 'selected' : ''}}>Atacant</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            <select name="Club">
                <option value="{{$x->Club}}" selected>{{$x->Club}}</option>
                @foreach($clubs as $z)
                <option value="{{$z->Nume}}">{{$z->Nume}}</option>
                @endforeach
            </select>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="Varsta" size="30" value="{{$x->Varsta}}"></td>
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
