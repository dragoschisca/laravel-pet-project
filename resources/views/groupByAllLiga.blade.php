<!DOCTYPE html>
<html>
<head>
    <title>Grupare Ligă</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Grupare ligă după țară</h1>
    <table>
        <tr>
            <th>Țară</th>
            <th>Numărul de ligi</th>
        </tr>
        @foreach($ligasByCountry as $liga)
        <tr>
            <td>{{ $liga->Tara }}</td>
            <td>{{ $liga->count }}</td>
        </tr>
        @endforeach
    </table>

    <h1>Grupare ligă după numărul de echipe</h1>
    <table>
        <tr>
            <th>Numărul de echipe</th>
            <th>Numărul de ligi</th>
        </tr>
        @foreach($ligasByNrTeams as $liga)
        <tr>
            <td>{{ $liga->Nr_Echipe }}</td>
            <td>{{ $liga->count }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
