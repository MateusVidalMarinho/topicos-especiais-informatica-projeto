<?php

namespace App\Http\Controllers;

use App\Livro;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $livros = Livro::orderBy('created_at', 'desc')->paginate(2);
        return view('home', compact('livros'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile() {
        $user = Auth::user();
        $usuario = User::find($user->id);
        $colecoes = $usuario->colecao;
        $pageTitle = 'Perfil';
        return view('user.profile', compact('pageTitle', 'user', 'colecoes'));
    }
}
