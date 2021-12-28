<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\StoreUpdatePost;
use  App\Models\Post;

class PostController extends Controller
{
    //
    //primeria function da rota
    public function index()
    {
        //comando para trazer a listagem.
        $posts = Post::get();//poderia ser também Post::all(); para trazer os dados
       //debug saber se trouxe os dados
        //dd($posts); //com a variavel.
        //imprimir o resultado na tela; tem q ser através de um loop

        return view('admin.posts.index', compact('posts'));

    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(StoreUpdatePost $req)
    {
      //dd($req ->title);
      $post = Post::create($req->all());

      //dd($post);
        return redirect()->route('post.index')
                          ->with('message', 'Post criado com sucesso');
    }

    //método show para recuperar informação
    public function show($id)
    {
      //esse é para trazer o primerio resultado.
    /*  $post = Post::where('id', $id)->first();
      dd($post);*/
      //se a variavel igual a null redirecione para index.
      if (!$post = Post::find($id)){
        return redirect()->route('post.index');
      }
      return view ('admin.posts.show', compact('post'));

    }

    public function destroy($id)
    {
      //dd("Deletando o post {$id}");

      if (!$post = Post::find($id))
        return redirect()->route('post.index');

      $post->delete();

      return redirect()
              ->route('post.index')
              ->with('message','Post deletado com sucesso');
    }

    public function edit($id)
    {
      if (!$post = Post::find($id)) {
        return redirect()->back();
        }
      return view('admin.posts.edit', compact ('post'));

    }
                            //a injeçoes de dependencia fazem antes do paramêtro
    public function update(StoreUpdatePost $req, $id)
    {
      if (!$post = Post::find($id)){
        return redirect()->back();
      }
      //dd("Editando o post: {$post->id}");
      $post->update($req->all());

      return redirect()
                    ->route('post.index')
                    ->with('message', 'Post editado com sucesso');
    }
}
