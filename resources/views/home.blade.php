@extends('master')
@section('titulo','Home')
@section('conteudo')
<div class="container my-5">
    <h1>Página Inicial</h1>
    <div class="row">
        @foreach ($livros as $livro)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
                    <a href="{{ config('app.url') . '/livros/' . $livro->slug }}">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $livro->title }}</h4>
                    <time>{{ $livro->created_at }}</time>
                    <p class="card-text">{{ $livro->description }}</p>
                    <a href="{{ config('app.url') . '/livros/' . $livro->slug }}" class="ml-0 btn btn-primary">Ver página</a>
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
