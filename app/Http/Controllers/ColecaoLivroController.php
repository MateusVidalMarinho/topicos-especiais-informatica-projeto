<?php

namespace App\Http\Controllers;

use App\Colecao;
use App\Livro;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ColecaoLivroController extends Controller
{

    public function index()
    {
    }

    public function create(string $colecaoSlug)
    {
        $colecao = Colecao::where('slug', $colecaoSlug)->firstOrFail();

        $livrosIds = [];
        foreach ($colecao->livro as $livro) {
            array_push($livrosIds, $livro->id);
        }

        $livros = Livro::whereNotIn('id', $livrosIds)->get();
        return view('colecoes_livro.create', compact('colecao', 'livros'));
    }

    public function store(Request $request)
    {
        $colecao = Colecao::findOrFail($request->all()['colecao_id']);
        $colecao->livro()->attach($request->all()['livro_id']);
        return redirect('/colecoes/' . $colecao->slug);
    }

    public function destroy(string $colecaoSlugAndLivroId)
    {
        try {
            $colecaoSlugAndLivroId = explode(';', $colecaoSlugAndLivroId);
            $colecaoSlug = $colecaoSlugAndLivroId[0];
            $livroId = $colecaoSlugAndLivroId[1];

            $colecao = Colecao::where('slug', $colecaoSlug)->firstOrFail();
            $colecao->livro()->detach($livroId);
            return redirect()->back();
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump('exception', $exception->getMessage());
        }
    }
}
