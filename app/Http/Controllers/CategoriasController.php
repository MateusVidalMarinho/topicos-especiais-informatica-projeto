<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->paginate(5);
        $breadcrumb = [
            [
                'type' => 'link',
                'text' => 'Página Inicial',
                'link' => '/'
            ],
            [
                'type' => 'active',
                'text' => 'Categorias',
                'link' => null
            ]
        ];
        $pageTitle = 'Categorias';
        if (Auth::user() != null) {
            $user = User::find(Auth::user()->id);
            var_dump($user);
        } else {
            $user = null;
        }
        return view('categorias.index', compact('pageTitle', 'user', 'breadcrumb', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Cadastrar Categoria";
        return view('categorias.create', ['pageTitle' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categoria::where('slug', $request->slug)->first();
        if ($categoria == null) {

            Categoria::create($request->all());
            return redirect('categorias');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        try {
            $categoria = Categoria::where('slug', $slug)->first();

            if ($categoria == null) {
                throw new ModelNotFoundException('Categoria not found');
            }

            $livros = $categoria->livro()->paginate(5);
            $breadcrumb = [
                [
                    'type' => 'link',
                    'text' => 'Página Inicial',
                    'link' => '/'
                ],
                [
                    'type' => 'link',
                    'text' => 'Categorias',
                    'link' => '/categorias'
                ],
                [
                    'type' => 'active',
                    'text' => $categoria->title,
                    'link' => null
                ]
            ];
            if (Auth::user() != null) {
                $user = User::find(Auth::user()->id);
                var_dump($user);
            } else {
                $user = null;
            }
            return view('categorias.show', compact('breadcrumb', 'categoria', 'livros', 'user'));
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump('exception');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        try {
            $categoria = Categoria::where('slug', $slug)->first();
            $pageTitle = "Atualizar Categoria";
            return view('categorias.update', ['categoria' => $categoria, 'pageTitle' => $pageTitle]);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump('exception');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect('categorias');
    }
}
