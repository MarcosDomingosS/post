<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|min:1|max:30',
            'descricao' => 'required|min: 1|max: 300'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]);
        return redirect('/posts');
    }
}
