<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acho que é aqui que controi os posts viu</title>
</head>
<body>
    <form action="/posts" method="post">
        @csrf
        <label for="titulo">
            Titulo:
        </label>
        <input type="text" name="titulo" id="titulo" placeholder="Insira um titulo para postagem"><br>
        <label for="descricao">
            Conteudo:
        </label>
        <input type="text" name="descricao" id="descricao" placeholder="Insira um conteudo para postagem"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
