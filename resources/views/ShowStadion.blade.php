<!DOCTYPE html>
<html>
<head>
    <title>Afisarea stadion</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
</head>
<body>
    @csrf
    @include('Navbar')

    <div class="buttons">
        <form action="{{ route('stadion.sort', ['criteria' => 'nume']) }}" method="GET">
            <button type="submit">Sort by nume</button>
            <input type="hidden" name="criteria" value="nume">
        </form>

        <form action="{{ route('stadion.sort', ['criteria' => 'Capacitate']) }}" method="GET">
            <button type="submit">Sort by nr capacitate</button>
            <input type="hidden" name="criteria" value="capacitate">
        </form>

        <form action="{{ route('stadion.groupByAllStadion') }}" method="GET">
            <button type="submit">Grupare</button>
        </form>
        <a href="stadion/create" class="button">Add stadion</a>
    </div>

    <div class="container">
        @foreach($stadions as $x)
        <div class="card">
            <h2>{{ $x->Nume }}</h2>
            <p><strong>Adresa:</strong> {{ $x->Adresa }}</p>
            <p><strong>Capacitate:</strong> {{ $x->Capacitate }}</p>
            <p><strong>Echipa:</strong> {{ $x->Echipa }}</p>
            <form method="get" action="stadion/delete/{{ $x->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Sterge</button>
            </form>
            <form method="get" action="stadion/edit/{{ $x->id }}">
                <button type="submit">Modifică</button>
            </form>
        </div>
        @endforeach
    </div>
    {{$stadions->links()}}
</body>
</html>
