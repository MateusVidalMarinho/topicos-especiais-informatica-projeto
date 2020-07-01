@extends('master')
@section('titulo', 'Atualizar Coleção')
@section('conteudo')
<h1>{{ 'Atualizar Coleção' }}</h1>
<form method="POST" action="{{ config('app.url') }}/colecoes/{{$colecao->id}}">
    @csrf
    @method("put")
    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" class="form-control" id="title" name="title" required minlength="3" value="<?= $colecao->title ?>">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required minlength="3" value="<?= $colecao->slug ?>">
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea class="form-control" id="description" name="description" required minlength="3"><?= $colecao->description ?></textarea>
    </div>
    <button class="btn btn-primary ml-0" type="submit">Salvar</button>
</form>
@endsection
