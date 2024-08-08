<!DOCTYPE html>
<html>
<head>
    <title>Atracciones por Especie</title>
</head>
<body>
    <h1>Atracciones que exhiben la especie</h1>
    <ul>
        @foreach ($attractions as $attraction)
            <li>{{ $attraction->titulo }}</li>
        @endforeach
    </ul>
</body>
</html>
