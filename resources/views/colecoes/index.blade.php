@extends('master')
@section('titulo', $pageTitle)
@section('conteudo')
<div class="bg-primary py-5">
    <div class="container text-center text-white">
        <h1>{{ $pageTitle }}</h1>
        <a href="{{config('app.url')}}/colecoes/create" class="btn btn-dark">Nova coleção</a>
    </div>
</div>
<div class="container my-5">
    @include('_components.breadcrumb', compact('breadcrumb'))
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Slug</th>
                <th colspan="2">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colecoes as $colecao)
            <tr>
                <td><a href="{{config('app.url')}}/colecoes/{{ $colecao->slug }}">{{ $colecao->title }}</a></td>
                <td>{{ $colecao->slug }}</td>
                <td>
                    <a href="{{config('app.url')}}/colecoes/{{ $colecao->slug }}/edit" class="btn btn-sm btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('colecoes.destroy', $colecao->slug) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $colecoes->links() }}
</div>
@endsection
