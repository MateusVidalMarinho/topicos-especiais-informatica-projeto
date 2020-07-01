<?php

namespace App\Http\Controllers;

use App\Colecao;
use App\Livro;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $breadcrumb = [
                [
                    'type' => 'link',
                    'text' => 'Página Inicial',
                    'link' => '/'
                ],
                [
                    'type' => 'active',
                    'text' => 'Minhas Coleções',
                    'link' => null
                ]
            ];
            $pageTitle = 'Minhas Coleções';
            $colecoes = $user->colecao()->where('user_id', $user->id)->paginate(5);
            return view('colecoes.index', compact('pageTitle', 'breadcrumb', 'user', 'colecoes'));
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump('exception');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Criar coleção";
        return view('colecoes.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $colecao = Colecao::where('slug', $request->slug)->first();
            if ($colecao == null) {
                $colecao = $request->all();
                Colecao::create($colecao);
                return redirect('/colecoes');
            }
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump('exception', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $colecao
     * @return \Illuminate\Http\Response
     */
    public function show(string $colecao)
    {
        try {
            $colecao = Colecao::where('slug', $colecao)->firstOrFail();
            return view('colecoes.show', compact('colecao'));
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $e) {
            var_dump('exception');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $colecao
     * @return \Illuminate\Http\Response
     */
    public function edit(string $colecao)
    {
        try {
            $colecao = Colecao::where('slug', $colecao)->firstOrFail();
            return view('colecoes.update', compact('colecao'));
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $e) {
            var_dump('exception');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colecao  $colecao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colecao $colecao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $colecao
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $colecao)
    {
        $colecao = Colecao::where('slug', $colecao)->firstOrFail();
        $colecao->livro()->delete();
        $colecao->delete();
        return redirect()->back();
    }
}
