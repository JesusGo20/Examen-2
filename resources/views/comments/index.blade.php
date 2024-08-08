<!DOCTYPE html>
<html>
<head>
    <title>Comentarios</title>
</head>
<body>
    <h1>Comentarios con calificación entre {{ $min }} y {{ $max }}</h1>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->nombre_usuario }}: {{ $comment->calificacion }}</li>
        @endforeach
    </ul>
</body>
</html>
