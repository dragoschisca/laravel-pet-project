<!DOCTYPE html>
<html>
<head>
    <title>Grupare jucători</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Grupare jucători</h1>

    <h2>Jucători grupați după echipă</h2>
    <table>
        <tr>
            <th>Echipă</th>
            <th>Număr de jucători</th>
        </tr>
        @foreach($jucatoriByEchipa as $jucator)
            <tr>
                <td>{{ $jucator->Club }}</td>
                <td>{{ $jucator->count }}</td>
            </tr>
        @endforeach
    </table>

    <h2>Jucători grupați după poziție</h2>
    <table>
        <tr>
            <th>Poziție</th>
            <th>Număr de jucători</th>
        </tr>
        @foreach($jucatoriByPozitie as $jucator)
            <tr>
                <td>{{ $jucator->Pozitia }}</td>
                <td>{{ $jucator->count }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
