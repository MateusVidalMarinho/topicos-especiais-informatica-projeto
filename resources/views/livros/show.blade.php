@extends('master')
@section('titulo', $livro->title)
@section('conteudo')
<div class="container my-5">
    @include('_components.breadcrumb', compact('breadcrumb'))
    <div class="row">
        <div class="col-8">
            <div class="d-flex">
                <h1>{{ $livro->title }}</h1>
                @if (!empty($user) && $user->is_admin == 1)
                <a href="{{config('app.url')}}/livros/create" class="btn btn-primary">Novo livro</a>
                @endif
            </div>
            <p>{{ $livro->description }}</p>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <div>
                    <h2 class="h5">Data de publicação:</h2>
                    <p>{{ $livro->published_at }}</p>
                </div>
                <div>
                    <h2 class="h5">Número de páginas:</h2>
                    <p>{{ $livro->pages }}</p>
                </div>
                <div>
                    <h2 class="h5">Autor:</h2>
                    <p>{{ $livro->author }}</p>
                </div>
                <div>
                    <h2 class="h5">Categoria:</h2>
                    <p>
                        <a href="{{ config('app.url') . '/categorias/' . $livro->categoria->slug }}">{{ $livro->categoria->title }}</a>
                    </p>
                </div>
            </div>
            <!-- <a href="#" class="btn btn-primary ml-0">Adicionar coleção</a> -->
        </div>
    </div>
</div>
@endsection
