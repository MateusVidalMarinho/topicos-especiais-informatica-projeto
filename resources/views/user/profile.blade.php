@extends('master')
@section('titulo', $pageTitle)
@section('conteudo')
<div class="container my-5">
    <h1>{{ $user->name }}</h1>
    <h2>Coleções</h2>
    <div class="row">
        @foreach($colecoes as $colecao)
        <div class="col-md-3">

            <div class="d-flex flex-row-reverse">
                <form action="{{ route('colecoes.destroy', $colecao->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger position-relative" style="margin-bottom: -15px;margin-right: -30px; z-index: 2;"><span class="fa fa-trash"></span></button><!-- TODO - Add tooltip -->
                </form>
            </div>
            <div class="card">

                <div class="card-body">
                    <h3 class="text-center">{{ $colecao->title }}</h3>
                    <div class="d-flex justify-content-center">
                        <span class="badge badge-primary rounded-circle py-3 px-3" style="width: 60px; height: 60px;">
                            <span class="h4">{{$colecao->livro->count()}}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
