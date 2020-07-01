@extends('master')
@section('titulo', $pageTitle)
@section('conteudo')
<h1>{{ $pageTitle }}</h1>
<form method="POST" action="{{ config('app.url') }}/livros">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Nome</label>
                <input type="text" class="form-control" id="title" name="title" required minlength="3">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required minlength="3">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="picture" name="picture" required minlength="3" value="zzz">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" required minlength="3"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="pages">Número de páginas</label>
                <input type="number" class="form-control" id="pages" name="pages" required minlength="1">
            </div>
            <div class="form-group">
                <label for="author">Nome do autor</label>
                <input type="text" class="form-control" id="author" name="author" required minlength="1">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <option value="0">Selecione a categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="published_at">Data de publicação</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at">
            </div>
        </div>
    </div>
    <button class="btn btn-primary ml-0" type="submit">Salvar</button>
</form>
@endsection
