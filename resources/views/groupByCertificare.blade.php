<!DOCTYPE html>
<html>
<head>
    <title>Grupare antrenori după certificare</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Grupare antrenori după certificare</h1>

    <table>
        <tr>
            <th>Certificare</th>
            <th>Antrenori</th>
        </tr>
        @foreach($groupedAntrenori as $certificare => $antrenori)
        <tr>
            <td>{{ $certificare }}</td>
            <td>
                <ul>
                    @foreach($antrenori as $antrenor)
                    <li>{{ $antrenor }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
