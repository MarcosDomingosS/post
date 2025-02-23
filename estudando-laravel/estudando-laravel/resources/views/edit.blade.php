<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando posts</title>
</head>
<body>
    <h1>Editando o Post</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif <!-- Se caso ouver algum erro, o mesmo será mostrado dentro deste if-->

    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT') <!--Especifica que o método será PUT para o Laravel, ele será enviado via POST, então requer que o atributo do form em "method" sejá POST-->

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{old('titulo', $post->titulo)}}">
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="{{old('descricao', $post->descricao)}}">
        <br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
