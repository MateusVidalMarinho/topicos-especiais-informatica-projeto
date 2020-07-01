@extends('master')
@section('conteudo')
@section('titulo', $pageTitle)
<div class="bg-primary py-5">
    <div class="container text-center text-white">
        <h1>{{ $pageTitle }}</h1>
        @if (Auth::user()->is_admin == 1)
        <a href="{{config('app.url')}}/livros/create" class="btn btn-dark">Novo livro</a>
        @endif
    </div>
</div>
<div class="container my-5">
    @include('_components.breadcrumb', compact('breadcrumb'))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de publicação</th>
                <th>Categoria</th>
                <th colspan="2">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
            <tr>
                <td>{{ $livro->title }}</td>
                <td>{{ $livro->published_at }}</td>
                <td>
                    <a href="{{config('app.url')}}/categorias/{{ $livro->categoria->slug }}">{{ $livro->categoria->title }}</a>
                </td>
                <td>
                    <a href="{{config('app.url')}}/livros/{{ $livro->slug }}/edit" class="btn btn-sm btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('livros.destroy', $livro->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $livros->links() }}
</div>
@endsection
