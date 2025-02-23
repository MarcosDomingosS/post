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
            @forelse($posts as $post) <!-- Cria os Posts, coletando os dados via método index ou show do Controller, dependendo da requisição da uri-->
                <li>
                    <strong>{{ $post->titulo }}</strong><br>
                    <p>{{ $post->descricao }}</p>
                    <p style="color: blue">{{$post->created_at->format('d/m/Y H:i')}}</p>
                </li>
                <a href="/posts/{{$post->id}}">Focar</a>
                <a href="/posts/{{$post->id}}/edit">Editar</a><br>
                <form action="{{route('posts.destroy', $post->id)}}" onsubmit="return confirm('Tem certeza que deseja excluir esse post?')" method="POST">
                    @csrf
                    @method('DELETE') <!--Especifica que o método será DELETE para o Laravel, ele será enviado via POST, então requer que o atributo do form em "method" sejá POST-->
                    <button type="submit" style="color: red;">Excluir</button>
                </form>
            @empty
                <p>Não há posts disponíveis.</p>
            @endforelse
        </ul>
    <a href="..">Voltar</a>
</body>
</html>
