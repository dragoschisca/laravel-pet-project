<!DOCTYPE html>
<html>
<head>
    <title>Acasă - Baza de date fotbal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
</head>
<body>
@include('Navbar')

    <h1>Baza de date fotbal</h1>
    
    <div class="content">
         <img src="{{ asset('images/logo.avif') }}" alt="">
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Chișca Dragoș</p>
    </footer>
</body>
</html>
