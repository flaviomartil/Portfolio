<?php

namespace App\Http\Controllers;

use App\Projetos;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Categorias;
use App\SobreMim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function getProjects()
    {
        $projetos = DB::table('projetos as proj')
            ->join('categorias as categoria', 'categoria.id', '=', 'categoria_id')
            ->select('proj.id', 'proj.nome', 'proj.imagem', 'proj.descricao', 'proj.link', 'categoria.nome_categoria')
            ->orderBy('categoria.nome_categoria', 'asc')
            ->get();
        return $projetos;
    }
    public function editAbout()
    {
        $about = SobreMim::findOrFail(1);
        return view('edit_about', compact('about'));
    }
    public function SaveAbout(Request $request)
    {
        $id = 1;
        $about = SobreMim::findOrFail($id);
        $about->nome = $request->nome;
        $about->website = $request->website;
        $about->telefone = $request->telefone;
        $about->telefone = $request->telefone;
        $about->cidade_atual = $request->cidade_atual;
        $about->idade = $request->idade;
        $about->email = $request->email;
        $about->email_profissional = $request->email_profissional;
        $about->freelance_status = $request->freelance_status;
        $about->aniversario = $request->aniversario;
        $about->endereco = $request->endereco;
        $about->cep = $request->cep;
        $about->resumo = $request->resumo;


        if ($about->save()) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $projeto = new Projetos();

        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->imagem = $request->imagem;
        $projeto->link = $request->link;
        $projeto->categoria_id = $request->categoria_id;
        $projeto->save();

        return redirect()->route('admin');
    }
    public function projectCreate()
    {
        $categorias = Categorias::get();
        return view('/create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categorias::get();
        $model = DB::table('projetos')
            ->join('categorias', 'categoria_id', '=', 'categorias.id')
            ->select('projetos.id', 'categoria_id', 'nome', 'nome_categoria', 'imagem', 'descricao', 'link')
            ->where("projetos.id", $id)
            ->first();
        return view('edit_project', compact('model', 'categorias', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projeto = Projetos::findOrFail($id);
        $projeto->nome = $request->nome;
        $projeto->descricao = $request->descricao;
        $projeto->imagem = $request->imagem;
        $projeto->link = $request->link;
        $projeto->categoria_id = $request->categoria_id;

        if ($projeto->save()) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $params = $request->all();
        $model = Projetos::findOrFail($params['id']);
        if ($model) {
            $model->delete();
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin');
        }
    }
}
