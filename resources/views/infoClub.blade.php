<!DOCTYPE html>
<html>
<head>
    <title>Afisarea club</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
            margin-top: 10px;
        }

        strong {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $club->Nume }}</h1>

        <!-- Imagine club -->
        <img src="{{ asset('images/' . $club->Imagine) }}" alt="Imagine Club">

        <!-- Informații despre antrenor -->
        <h2>Antrenor</h2>
        <table>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Imagine</th>
            </tr>
            @if($antrenor)
            <tr>
                <td>{{ $antrenor->Nume }}</td>
                <td>{{ $antrenor->Prenume }}</td>
                <td><img src="{{ asset('images/' . $antrenor->Imagine) }}" alt="Imagine Antrenor"></td>
            </tr>
            @endif
        </table>

        <!-- Informații despre stadion -->
        <h2>Stadion</h2>
        <table>
            <tr>
                <th>Nume</th>
                <th>Adresa</th>
                <th>Capacitate</th>
            </tr>
            @if($stadion)
            <tr>
                <td>{{ $stadion->Nume }}</td>
                <td>{{ $stadion->Adresa }}</td>
                <td>{{ $stadion->Capacitate }}</td>
            </tr>
            @endif

        </table>

        <!-- Informații despre jucători -->
        <h2>Jucători</h2>
        <table>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Imagine</th>
            </tr>
            @foreach($jucatori as $jucator)
            <tr>
                <td>{{ $jucator->Nume }}</td>
                <td>{{ $jucator->Prenume }}</td>
                <td><img src="{{ asset('images/' . $jucator->Imagine) }}" alt="Imagine Jucator"></td>
            </tr>
            @endforeach
        </table>

        <!-- Verifică dacă clubul este lider în ligă -->
        @if($liderLiga)
            <p><strong>Clubul este lider în liga sa.</strong></p>
        @endif
    </div>
</body>
</html>
