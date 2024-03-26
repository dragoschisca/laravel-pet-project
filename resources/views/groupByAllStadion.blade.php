<!DOCTYPE html>
<html>
<head>
    <title>Grupare Stadioane</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Grupare Stadioane după Țară</h1>
    <table>
        <tr>
            <th>Țară</th>
            <th>Număr de Stadioane</th>
        </tr>
        @foreach($stadionsByCountry as $stadion)
        <tr>
            <td>{{ $stadion->Tara }}</td>
            <td>{{ $stadion->count }}</td>
        </tr>
        @endforeach
    </table>

    <h1>Stadioane Mici (până la 20,000 locuri)</h1>
    <table>
        <tr>
            <th>Nume</th>
            <th>Adresa</th>
            <th>Capacitate</th>
        </tr>
        @foreach($smallStadions as $stadion)
        <tr>
            <td>{{ $stadion->Nume }}</td>
            <td>{{ $stadion->Adresa }}</td>
            <td>{{ $stadion->Capacitate }}</td>
        </tr>
        @endforeach
    </table>

    <h1>Stadioane Medii (20,001 - 50,000 locuri)</h1>
    <table>
        <tr>
            <th>Nume</th>
            <th>Adresa</th>
            <th>Capacitate</th>
        </tr>
        @foreach($mediumStadions as $stadion)
        <tr>
            <td>{{ $stadion->Nume }}</td>
            <td>{{ $stadion->Adresa }}</td>
            <td>{{ $stadion->Capacitate }}</td>
        </tr>
        @endforeach
    </table>

    <h1>Stadioane Mari (peste 50,000 locuri)</h1>
    <table>
        <tr>
            <th>Nume</th>
            <th>Adresa</th>
            <th>Capacitate</th>
        </tr>
        @foreach($largeStadions as $stadion)
        <tr>
            <td>{{ $stadion->Nume }}</td>
            <td>{{ $stadion->Adresa }}</td>
            <td>{{ $stadion->Capacitate }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
