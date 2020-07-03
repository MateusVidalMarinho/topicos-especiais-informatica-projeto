<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Livro;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivrosController extends Controller
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
        $livros = Livro::paginate(5);
        $breadcrumb = [
            [
                'type' => 'link',
                'text' => 'Página Inicial',
                'link' => '/'
            ],
            [
                'type' => 'active',
                'text' => 'Livros',
                'link' => null
            ]
        ];
        $pageTitle = 'Livros';
        $user = User::findOrFail(Auth::user()->id);
        return view('livros.index', compact('pageTitle', 'user', 'breadcrumb', 'livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $pageTitle = "Cadastrar Livro";
        $breadcrumb = [
            [
                'type' => 'link',
                'text' => 'Página Inicial',
                'link' => '/'
            ],
            [
                'type' => 'link',
                'text' => 'Livros',
                'link' => '/livros'
            ],
            [
                'type' => 'active',
                'text' => 'Cadastrar livro',
                'link' => null
            ]
        ];
        return view('livros.create', compact('pageTitle', 'breadcrumb', 'categorias'));
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
            $livro = Livro::where('slug', $request->slug)->first();
            var_dump($request->all()['categoria_id']);
            if ($livro == null) {

                Livro::create($request->all());
                return redirect('livros');
            }
            var_dump('oia olo');
        } catch (ModelNotFoundException $modelNotFoundException) {
            return view('notfound');
        } catch (Exception $exception) {
            var_dump("exception: " . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    // public function show(Livro $livro)
    public function show(string $slug)
    {
        try {
            $livro = Livro::where('slug', $slug)->firstOrFail();
            $breadcrumb = [
                [
                    'type' => 'link',
                    'text' => 'Página Inicial',
                    'link' => '/'
                ],
                [
                    'type' => 'active',
                    'text' => $livro->title,
                    'link' => null
                ]
            ];
            $user = User::find(Auth::user()->id);
            return view('livros.show', compact('user', 'livro', 'breadcrumb'));
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
            $categorias = Categoria::all();
            $livro = Livro::where('slug', $slug)->firstOrFail();
            $pageTitle = "Atualizar Livro";
            return view('livros.update', compact('pageTitle', 'categorias', 'livro'));
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
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        $livro->categoria_id = $request->all()['categoria_id'];
        $livro->update($request->all());
        return redirect('livros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect('livros');
    }
}
