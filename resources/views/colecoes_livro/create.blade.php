@extends('master')
@section('titulo', 'Coleção: ' . $colecao->slug)
@section('conteudo')
<form method="POST" action="{{ config('app.url') }}/colecao_livro">
    @csrf
    <input type="hidden" name="colecao_id" value="{{ $colecao->id }}">
    <label for="livro_id">Livro</label>
    <select class="form-control" id="livro_id" name="livro_id" required>
        <option value="0">Selecione um livro</option>
        @foreach ($livros as $livro)
        <option value="{{ $livro->id }}">{{ $livro->title }}</option>
        @endforeach
    </select>
    <button class="btn btn-primary ml-0" type="submit">Salvar</button>
</form>
@endsection
