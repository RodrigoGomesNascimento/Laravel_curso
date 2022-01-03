
<!-- dessa forma se mudar o end da rota não tenho que sari mexendo no codigo todo-->
<a href="{{ route('post.create') }}">Criar novo Post.</a>
<hr>
  @if (session('message'))
    <div>
        {{(session('message'))}}
    </div>
  @endif

        <form action="{{route('post.search')}}" method="post">
            @csrf
                <input type="text" name="search" placeholder="Filtrar:">
                <button type="submit">Filtrar</button>
        </form>
        <h1>Super posts</h1>

            @foreach ($posts as $post)

                <p>
                  {{$post->title}}[
                    <a href="{{route('post.show', $post->id) }}">Ver</a> | <a href="{{route('post.edit', $post->id)}}">Edit</a>
                  ]
                </p>


            @endforeach
<hr>
<!-- Mudou pelo fato da paginaçao -->
@if (isset($filters))
{{$posts->appends($filters)->links() }}
@else
{{ $posts->links() }}

@endif

