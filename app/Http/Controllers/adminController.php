<?php

namespace App\Http\Controllers;

use App\Projetos;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Categorias;
use App\SobreMim;
use App\Competencias;
use App\Educacao;
use App\Experiencias;
use App\DetalhesExperiencias;
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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
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
    public function saveExperiencias(Request $request)
    {
        $params = $request->all();
        $detalhes = [];
        dd($params);
        foreach ($params['detalhe'] as $detalhe) {
            $detalhes[] = $detalhe;
        }
    }
    public function viewExperiencias()
    {
        return view('experiencias');
    }
    public function listarExperiencias()
    {
        $experiencias = Experiencias::orderBy('inicio')->get();

        foreach ($experiencias as $experiencia) {
            $inicio = strtotime($experiencia->inicio);
            $inicio = date('d/m/Y', $inicio);
            $fim = strtotime($experiencia->fim);
            $fim = date('d/m/Y', $fim);
            $experiencia->inicio = $inicio;
            $experiencia->fim = $fim;
        }

        return $experiencias;
    }

    public function showExperiencias($id)
    {
        $experiencias = Experiencias::orderBy('inicio')->where('id', $id)->get();
        $detalhes = DetalhesExperiencias::where('experiencias_id', $id)->get();
        $empresas = [];

        foreach ($experiencias as $experiencia) {
            $empresas['empresa'] = $experiencia->empresa;
            $empresas['cidade'] = $experiencia->cidade;
            $empresas['estado'] = $experiencia->estado;
            $empresas['cargo'] = $experiencia->cargo;
            $empresas['inicio'] = $experiencia->inicio;
            $empresas['fim'] = $experiencia->fim;
        }
        foreach ($detalhes as $key => $detalhe) {
            $empresas['detalhes'][$key] = $detalhe->detalhes;
        }

        return view('/edit_experiencias', compact('empresas'));
    }
    public function destroyExperiencias(Request $request)
    {
        $params = $request->all();
        $detalhes = DetalhesExperiencias::where('experiencias_id', $params['id']);
        $experiencias = Experiencias::findOrFail($params['id']);
        if ($experiencias && $detalhes) {
            $detalhes->delete();
            $experiencias->delete();
            return redirect()->route('experiencias');
        } else {
            return redirect()->route('experiencias');
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
