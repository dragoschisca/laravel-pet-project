<!DOCTYPE html>
<html>
<head>
    <title>Afisarea jucator</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
</head>
<body>
    @csrf
    @include('Navbar')

    <div class="buttons">
        <form action="{{ route('jucator.sort', ['criteria' => 'nume']) }}" method="GET">
            <button type="submit">Sort by nume</button>
            <input type="hidden" name="criteria" value="nume">
        </form>

        <form action="{{ route('jucator.sort', ['criteria' => 'varsta']) }}" method="GET">
            <button type="submit">Sort by varsta</button>
            <input type="hidden" name="criteria" value="varsta">
        </form>

        <form action="{{ route('jucator.groupByAll') }}" method="GET">
            <button type="submit">Grupare</button>
        </form>


        <a href="jucator/create" class="button">Add jucator</a>
    </div>

    <div class="container">
        @foreach($jucators as $x)
        <div class="card">
        <img src="{{ asset('images/' . $x->Imagine) }}" alt="{{ $x->Nume }}"> 
            <h2>{{ $x->Nume }} {{ $x->Prenume }}</h2>
            <p><strong>Club:</strong> {{ $x->Club }}</p>
            <p><strong>Pozitia:</strong> {{ $x->Pozitia }}</p>
            <p><strong>Varsta:</strong> {{ $x->Varsta }}</p>
            <form method="get" action="jucator/delete/{{ $x->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Sterge</button>
            </form>
            <form method="get" action="jucator/edit/{{ $x->id }}">
                <button type="submit">Modifică</button>
            </form>
        </div>
        @endforeach
    </div>
    {{ $jucators->links() }}
</body>
</html>
