<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h1>Lista de Posts</h1>

        <ul>
            @forelse($posts as $post)
                <li>
                    <strong>{{ $post->titulo }}</strong><br>
                    <p>{{ $post->descricao }}</p>
                </li>
            @empty
                <p>Não há posts disponíveis.</p>
            @endforelse
        </ul>
    <a href="..">Voltar</a>
</body>
</html>
