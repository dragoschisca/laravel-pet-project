<!DOCTYPE html>
<html>
<head>
    <title>Afisarea liga</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
</head>
<body>
    @csrf
    @include('Navbar')

    <div class="buttons">
        <form action="{{ route('liga.sort', ['criteria' => 'nume']) }}" method="GET">
            <button type="submit">Sort by nume</button>
            <input type="hidden" name="criteria" value="nume">
        </form>

        <form action="{{ route('liga.sort', ['criteria' => 'nr_echipe']) }}" method="GET">
            <button type="submit">Sort by nr echipe</button>
            <input type="hidden" name="criteria" value="nr_echipe">
        </form>

        <form action="{{ route('liga.groupByAllLiga') }}" method="GET">
            <button type="submit">Grupare</button>
        </form>

        <a href="liga/create" class="button">Add liga</a>
    </div>

    <div class="container">
        @foreach($ligas as $x)
        <div class="card">
            <h2>{{ $x->Nume }}</h2>
            <p><strong>Tara:</strong> {{ $x->Tara }}</p>
            <p><strong>Nr echipe:</strong> {{ $x->Nr_Echipe }}</p>
            <p><strong>Lider:</strong> {{ $x->Lider }}</p>
            <form method="get" action="liga/delete/{{ $x->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Sterge</button>
            </form>
            <form method="get" action="liga/edit/{{ $x->id }}">
                <button type="submit">Modifică</button>
            </form>
        </div>
        @endforeach
    </div>
    {{$ligas->links()}}
</body>
</html>
