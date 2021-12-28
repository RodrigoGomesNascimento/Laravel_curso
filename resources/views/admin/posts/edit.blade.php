
<h1>Editar o Post{{$post->title}}</h1>
<!-- para exibir os erros da validação  o metod any() retorna true-->

@if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
       @endforeach
    </ul>
@endif

<form class="" action="{{route('post.update', $post->id)}}" method="post">
  @csrf
  @method('put')
  <!-- o old é para manter o q foi escrito no campo onde não houve erro sem ele fica em branco.-->
  <input type="text" name="title" id="title" placeholder="Titulo" value="{{$post->title}}">
  <textarea name="content" id="content" rows="4" cols="30" placeholder="Conteúdo" > {{$post->content}} </textarea>
  <button type="submit" >Enviar</button>

</form>
