@extends('master')
@section('titulo', 'Coleção: ' . $colecao->slug)
@section('conteudo')
<div class="d-flex">
    <h1>Coleção: {{$colecao->slug}}</h1>
    <a href="{{config('app.url')}}/colecao_livro/create/{{$colecao->slug}}" class="btn btn-primary">Associar Item</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Slug</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colecao->livro as $livro)
        <tr>
            <td><a href="{{config('app.url')}}/colecao_livro/{{ $livro->slug }}">{{ $livro->title }}</a></td>
            <td>{{ $livro->slug }}</td>
            <td>
                <form action="{{ route('colecao_livro.destroy', $colecao->slug . ';' . $livro->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
