@extends('master')
@section('titulo', $pageTitle)
@section('conteudo')
<div class="container my-5">
    <h1>{{ $pageTitle }}</h1>
    <form method="POST" action="{{ config('app.url') }}/colecoes">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" class="form-control" id="title" name="title" required minlength="3">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required minlength="3">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" required minlength="3"></textarea>
        </div>
        <button class="btn btn-primary ml-0" type="submit">Salvar</button>
    </form>
</div>
@endsection
