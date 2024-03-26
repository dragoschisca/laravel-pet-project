<!DOCTYPE html>
<html>
<head>
    <title>Afisarea club</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}">
</head>
<body>
    @csrf
    @include('Navbar')

    <div class="buttons">
        <form action="{{ route('club.sort', ['criteria' => 'nume']) }}" method="GET">
            <button type="submit">Sort by nume</button>
            <input type="hidden" name="criteria" value="nume">
        </form>

        <form action="{{ route('club.sort', ['criteria' => 'pret']) }}" method="GET">
            <button type="submit">Sort by pret</button>
            <input type="hidden" name="criteria" value="pret">
        </form>

        <form action="{{ route('club.sumaClubs') }}" method="GET">
            <button type="submit">Suma</button>
        </form>

        <a href="club/create" class="button">Add club</a>
    </div>

    <div class="container">
    @foreach($clubs as $x)
    <div class="card">
        <div class="card-background"></div>
        <div class="card-content">
        <img src="{{ asset('images/' . $x->Imagine) }}" alt="{{ $x->Nume }}"> 
        <h2>{{ $x->Nume }}</h2>
        <p><strong>Jucători:</strong> {{ $x->Jucatori }}</p>
        <p><strong>Antrenor:</strong> {{ $x->Antrenor }}</p>
        <p><strong>Preț:</strong> {{ $x->Pret }}</p>
        <form method="get" action="club/delete/{{ $x->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Sterge</button>
        </form>
        <form method="get" action="club/edit/{{ $x->id }}">
            <button type="submit">Modifică</button>
        </form>
        <form method="GET" action="{{ route('club.infoClub', ['id' => $x->id]) }}">
                        <button type="submit">Info</button>
                    </form>
        </div>
    </div>
    @endforeach
</div>

    {{$clubs->links()}}
</body>
</html>
