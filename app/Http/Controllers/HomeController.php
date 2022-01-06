<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meusProjetos = DB::table('projetos')
            ->join('categorias', 'categoria_id', '=', 'categorias.id')
            ->select('projetos.id', 'nome', 'nome_categoria', 'imagem', 'descricao', 'link')
            ->orderBy('projetos.id')
            ->get('');
        return view('admin', compact('meusProjetos'));
    }
}
