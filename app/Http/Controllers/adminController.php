<?php

namespace App\Http\Controllers;

use App\projetos;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\categorias;
use App\sobreMim;
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
    public function editAbout()
    {
        $model = DB::select("select id,nome,website,telefone,cidade_atual,idade,email,email_profissional,freelance_status,aniversario,endereco,cep   from sobre_mims where id = 1");
        $about = $model[0];
        return view('edit_about', compact('about'));
    }
    public function SaveAbout(Request $request)
    {
        $id = 1;
        $about = sobreMim::findOrFail($id);
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
        $projeto = new projetos();

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
        $categorias = categorias::get();
        return view('/create', compact('tipo', 'categorias'));
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
        $categorias = categorias::get();
        $model = DB::table('projetos')
            ->join('categorias', 'categoria_id', '=', 'categorias.id')
            ->select('projetos.id', 'nome', 'nome_categoria', 'imagem', 'descricao', 'link')
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
        $projeto = projetos::findOrFail($id);
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
    public function destroy($id)
    {
        $model = projetos::findOrFail($id);
        if ($model) {
            $model->delete();
            return redirect()->route('admin');
        } else {
            return redirect()->route('admin');
        }
    }
}
