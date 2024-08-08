<!DOCTYPE html>
<html>
<head>
    <title>Atracciones</title>
</head>
<body>
    <h1>Lista de Atracciones</h1>
    <ul>
        @foreach ($attractions as $attraction)
            <li>
                {{ $attraction->titulo }} - Calificación Promedio: {{ $attraction->calificacion_promedio ?? 'N/A' }}
            </li>
        @endforeach
    </ul>
</body>
</html>
