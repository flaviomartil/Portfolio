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

    $model = User::find(Auth::user()->id);
    $tipo = $model->type_user;
    $meusProjetos = DB::table('projetos')
    ->join('categorias', 'categoria_id', '=', 'categorias.id')
    ->select('projetos.id','nome','nome_categoria','imagem','descricao','link')
    ->orderBy('projetos.id')
    ->get('');
    if($tipo == 2){
        return view('admin',compact('tipo','meusProjetos'));
    }else{
        return redirect()->route('home');
    }

    }
}
