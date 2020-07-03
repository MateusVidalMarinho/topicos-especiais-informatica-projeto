@extends('master')
@section('titulo', 'Categoria | ' . $categoria->title)
@section('conteudo')
<div class="container my-5">
    <div class="d-flex">
        <h1>{{ $categoria->title }}</h1>
        @if (!empty($user) && $user->is_admin == 1)
        <a href="{{config('app.url')}}/categorias/{{$categoria->slug}}/edit" class="btn btn-primary">Editar Categoria</a>
        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-sm btn-danger d-inline-block my-2 mx-2">Excluir</button>
        </form>
        @endif
    </div>
    <p>{{ $categoria->description }}</p>
    @include('_components.breadcrumb', compact('breadcrumb'))
    <div class="row">
        @foreach ($livros as $livro)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $livro->title }}</h3>
                    <p class="card-text">{{ $livro->description }}</p>
                    <a href="/livros/{{ $livro->slug }}" class="btn btn-primary ml-0">Ver Livro</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $livros->links() }}
        </div>
    </div>
</div>
@endsection
