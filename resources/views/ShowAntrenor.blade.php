<!DOCTYPE html>
<html>
<head>
	<title>Afisarea antrenor</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}"></head>
</head>
<body>
    @csrf
    @include('Navbar')

    <div class="buttons">
    <form action="{{ route('antrenor.sort', ['criteria' => 'nume']) }}" method="GET">
        <button type="submit">Sort by nume</button>
        <input type="hidden" name="criteria" value="nume">
            @csrf
            @foreach ($_GET as $key => $value)
                @if ($key !== 'page')
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
    </form>

        <form action="{{ route('antrenor.sort', ['criteria' => 'varsta']) }}" method="GET">
            <button type="submit">Sort by vârstă</button>
            <input type="hidden" name="criteria" value="varsta">
            @csrf
            @foreach ($_GET as $key => $value)
                @if ($key !== 'page')
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
        </form>

        <form action="{{ route('antrenor.groupByCertificare') }}" method="GET">
            <button type="submit">Grupare</button>
        </form>

        <a href="antrenor/create" class="button">Add antrenor</a>
    </div>

    <div class="container">
        @foreach($antrenors as $x)
        <div class="card">
        <img src="{{ asset('images/' . $x->Imagine) }}" alt="{{ $x->Nume }} {{ $x->Prenume }}"> 
            <h2>{{ $x->Nume }} {{ $x->Prenume }}</h2>
            <p><strong>Certificare:</strong> {{ $x->Certificare }}</p>
            <p><strong>Club:</strong> {{ $x->Club }}</p>
            <p><strong>Varsta:</strong> {{ $x->Varsta }}</p>
            <form method="get" action="antrenor/delete/{{ $x->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Sterge</button>
            </form>
            <form method="get" action="antrenor/edit/{{ $x->id }}">
                <button type="submit">Modifică</button>
            </form>
        </div>
        @endforeach
    </div>
    {{ $antrenors->links() }}

</body>
</html>