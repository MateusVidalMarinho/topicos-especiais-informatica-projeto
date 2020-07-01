@extends('master')
@section('titulo', $pageTitle)
@section('conteudo')
<div class="bg-primary py-5">
    <div class="container text-center text-white">
        <h1>{{ $pageTitle }}</h1>

        @if (Auth::user()->is_admin == 1)
        <a href="{{config('app.url')}}/categorias/create" class="btn btn-dark">Nova Categoria</a>
        @endif
    </div>
</div>
<div class="container my-5">
    @include('_components.breadcrumb', compact('breadcrumb'))
    <div class="row">
        @foreach ($categorias as $categoria)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $categoria->title }}</h3>
                    <p class="card-text">{{ $categoria->description }}</p>
                    <p>Livros na categoria: {{ count($categoria->livro) }}</p>
                    <a href="{{ config('app.url') }}/categorias/{{ $categoria->slug }}" class="btn btn-primary ml-0">Ver categoria</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $categorias->links() }}
        </div>
    </div>
</div>
@endsection
