<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Aqui está um exemplo de cada função-base no Controller

    public function index(){
        $posts = Post::all(); // Pega todos os dados da tabela que o Model Post está se baseando
        return view('posts', compact('posts')); // Compacta os dados e envia pra bem-dita da view, agora podendo brincar em posts.blade.php
    } // Exibe lista de recursos, funcionando como um "SELECT * FROM TB_ALGUMA_COISA"

    public function create(){
        return view('create'); // Somente leva para o formulario de criação em create.blade.php, nada tão incrivel
    } // Exibe o formulário para criar um novo recurso, só isso mesmo. Dentro do formulario o método sempre é posts por razões obvias

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|min:1|max:30',
            'descricao' => 'required|min: 1|max: 300'
        ]);
        /** Vou listar aqui os principais métodos da classe "Request", mas entenda que é tudo que enviado de inputs com algum certo método, igual no php:
         * $request->input() - Recupera um valor de input (POST ou GET).
         * $request->all() - Recupera todos os dados de entrada.
         * $request->only() - Recupera apenas os dados especificados.
         * $request->except() - Inverso do only().
         * $request->has() - Verifica se um campo de entrada existe.
         * $request->isMethod() - Verifica o método HTTP da requisição.
         * $request->file() - Recupera um arquivo enviado via formulário.
         * $request->validate() - Valida os dados da requisição de acordo com as regras especificadas.
         */

        Post::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]); // Cria e salva um registro em que o model esteja interligado.
        return redirect('/posts');
    } // Armazena os dados enviados pelo formulário (REQUER MÉTODO POST).

    public function show($id){
        $posts = Post::where('id', $id)->get(); // É igual o fofinho do WHERE do menino sql, especifique a coluna, a condição se for igual e use get() para pegar

        return view('posts', compact('posts'));
    } // Exibe um único recurso.

    public function edit($id){
        $post = Post::findOrFail($id); // Procura o registro via id, caso não retorne nada, dará erro 404.
        return view('edit', compact('post'));
    } // Exibe o formulário para editar algum recurso existente.

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required|max:30',
            'descricao' => 'required|max:300'
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]); // Método que faz "UPDATE" na coluna

        return redirect()->route('posts.index');
    } // Atualiza um recurso existente (NECESSITA DE METODO PUT/PATCH).

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete(); // Simplesmente manda a coluna com o id especificado de arrasta pra cima

        return redirect()->route('posts.index');
    } // Exclui um recurso (NECESSITA DE MÉTODO DELETE)
}
