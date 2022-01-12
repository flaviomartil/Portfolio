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
use URL;
use Validator;
use Redirect;

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

    public function editCompetencias()
    {
        $competencias = Competencias::where('usuario_id', 1)->get();
        return view('edit_competencias', compact('competencias'));
    }

    public function SaveCompetencias(Request $request)
    {
        $id = 1;
        $params = $request->all();
        $competencias = Competencias::where('usuario_id', 1)->get();


        $v = Validator::make($request->all(), [
            "detalhes.*"  => "required|string|distinct",
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }

        if (count($competencias)) {
            foreach ($competencias as $competencia) {
                $competencia->delete();
            }
        }

        foreach ($params['detalhes'] as $detalhe) {
            $salvarDetalhe = new Competencias();
            $salvarDetalhe->detalhes = $detalhe;
            $salvarDetalhe->usuario_id = $id;
            $salvarDetalhe->save();
        }
        if ($salvarDetalhe) {
            return redirect()->route('admin');
        }
    }

    public function SaveAbout(Request $request)
    {
        $id = 1;
        $about = SobreMim::findOrFail($id);
        $about->nome = $request->nome;
        $about->msgTopo = $request->msgTopo;
        $about->msgDigitada = $request->msgDigitada;
        $about->website = $request->website;
        $about->telefone = $request->telefone;
        $about->cidade_atual = $request->cidade_atual;
        $about->idade = $request->idade;
        $about->email = $request->email;
        $about->email_profissional = $request->email_profissional;
        $about->freelance_status = $request->freelance_status;
        $about->aniversario = $request->aniversario;
        $about->endereco = $request->endereco;
        $about->cep = isset($request->cep) ? $request->cep : null;
        $about->resumo = $request->resumo;
        $about->msgPrincipal = $request->msgPrincipal;

        $v = Validator::make($request->all(), [
            'nome' => 'required',
            'website' => 'required',
            'telefone' => 'required',
            'cidade_atual' => 'required',
            'idade' => 'required',
            'email' => 'required',
            'email_profissional' => 'required',
            'freelance_status' => 'required',
            'aniversario' => 'required',
            'endereco' => 'required',
            'resumo' => 'required',
            'msgPrincipal' => 'required',
            'msgDigitada' => 'required',
            'msgTopo' => 'required',
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }


        if ($about->save()) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin');
        }
    }

    public function listarEducacao()
    {
        $educacoes = Educacao::orderBy('inicio')->get();

        foreach ($educacoes as $educacao) {
            $inicio = strtotime($educacao->inicio);
            $inicio = date('d/m/Y', $inicio);
            $fim = strtotime($educacao->fim);
            $fim = date('d/m/Y', $fim);
            $educacao->inicio = $inicio;
            $educacao->fim = $fim;
        }

        return $educacoes;
    }

    public function viewEducacoes()
    {
        return view('educacao');
    }

    public function destroyEducacaoes(Request $request)
    {
        $params = $request->all();
        $educacao = Educacao::findOrFail($params['id']);
        if ($educacao) {
            $educacao->delete();
            $educacao->delete();
            return redirect()->route('educacao');
        } else {
            return redirect()->route('educacao');
        }
    }

    public function educacaoCView()
    {
        return view('create_educacao');
    }

    public function createEducacao(Request $request)
    {
        $params = $request->all();
        $userId = Auth::id();

        $v = Validator::make($request->all(), [
            'escola' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'tipo' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }

        $educacao = new Educacao();
        $educacao->escola = $params['escola'];
        $educacao->cidade = $params['cidade'];
        $educacao->estado = $params['estado'];
        $educacao->usuario_id = $userId;
        $educacao->tipo = $params['tipo'];
        $educacao->inicio = $params['inicio'];
        $educacao->fim = $params['fim'];
        $educacao->save();

        if ($educacao) {
            return redirect()->route('educacao')->with(['sucess' => 'Ensino adicionado ao portfolio']);
        }
        return redirect()->route('admin');
    }

    public function showEducacao($id)
    {
        $educacoes = Educacao::orderBy('inicio')->where('id', $id)->get();
        $escolaridade = [];
        foreach ($educacoes as $educacao) {
            $escolaridade['id'] = $educacao->id;
            $escolaridade['escola'] = $educacao->escola;
            $escolaridade['cidade'] = $educacao->cidade;
            $escolaridade['estado'] = $educacao->estado;
            $escolaridade['tipo'] = $educacao->tipo;
            $escolaridade['inicio'] = $educacao->inicio;
            $escolaridade['fim'] = $educacao->fim;
        }
        return view('/edit_educacao', compact('escolaridade'));
    }

    public function saveEducacao(Request $request)
    {
        $params = $request->all();
        $id = $request->route('id');
        $educacao = Educacao::findOrfail($id);
        $v = Validator::make($request->all(), [
            'escola' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'tipo' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }

        $educacao->escola = $params['escola'];
        $educacao->cidade = $params['cidade'];
        $educacao->estado = $params['estado'];
        $educacao->tipo = $params['tipo'];
        $educacao->inicio = $params['inicio'];
        $educacao->fim = $params['fim'];


        if ($educacao->save()) {
            return redirect()->route('educacao');
        }
    }

    public function saveExperiencias(Request $request)
    {
        $params = $request->all();
        $id = $request->route('id');
        $experiencias = Experiencias::findOrfail($id);
        $detalhes = DetalhesExperiencias::where('experiencias_id', $id);
        $v = Validator::make($request->all(), [
            'empresa' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cargo' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            "detalhe.*"  => "required|string|distinct",
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }
        $detalhes->delete();
        $experiencias->empresa = $params['empresa'];
        $experiencias->cidade = $params['cidade'];
        $experiencias->estado = $params['estado'];
        $experiencias->cargo = $params['cargo'];
        $experiencias->inicio = $params['inicio'];
        $experiencias->fim = $params['fim'];

        if ($experiencias->save()) {
            foreach ($params['detalhe'] as $detalhe) {
                $salvarDetalhe = new DetalhesExperiencias();
                $salvarDetalhe->detalhes = $detalhe;
                $salvarDetalhe->experiencias_id = $id;
                $salvarDetalhe->save();
            }
            if ($salvarDetalhe) {
                return redirect()->route('experiencias');
            }
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
            $empresas['id'] = $experiencia->id;
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

    public function createExperiencias(Request $request)
    {
        $params = $request->all();
        $userId = Auth::id();

        $v = Validator::make($request->all(), [
            'empresa' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cargo' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            "detalhe.*"  => "required|string|distinct",
        ]);

        $erros = [];
        if ($v->fails()) {
            foreach ($v->errors()->messages() as $messages) {
                $erros[] = $messages;
            }
            return Redirect::back()->withErrors($erros);
        }
        $experiencias = new Experiencias();
        $experiencias->empresa = $params['empresa'];
        $experiencias->cidade = $params['cidade'];
        $experiencias->estado = $params['estado'];
        $experiencias->usuario_id = $userId;
        $experiencias->cargo = $params['cargo'];
        $experiencias->inicio = $params['inicio'];
        $experiencias->fim = $params['fim'];
        $experiencias->save();

        if ($experiencias) {
            foreach ($params['detalhe'] as $detalhe) {
                $salvarDetalhe = new DetalhesExperiencias();
                $salvarDetalhe->detalhes = $detalhe;
                $salvarDetalhe->experiencias_id = $experiencias->id;
                $salvarDetalhe->save();
            }
            if ($salvarDetalhe) {
                return redirect()->route('experiencias')->with(['sucess' => 'Experiência e detalhes criados com sucesso']);
            }

            return redirect()->route('admin');
        }
    }

    public function projectCreate()
    {
        $categorias = Categorias::get();
        return view('/create', compact('categorias'));
    }

    public function experienciasCreate()
    {
        return view('/create_experiencias');
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
