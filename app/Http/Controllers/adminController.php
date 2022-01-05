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
        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if ($tipo == 2) {
            $model = DB::select("select id,nome,website,telefone,cidade_atual,idade,email,email_profissional,freelance_status,aniversario,endereco,cep   from sobre_mims where id = 1");
            $about = $model[0];
            return view('edit_about', compact('about'));
        } else {
            return redirect()->route('welcome');
        }
    }
    public function SaveAbout(Request $request)
    {
        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if ($tipo == 2) {
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if ($tipo == 2) {
            $projeto = new projetos();

            $projeto->nome = $request->nome;
            $projeto->descricao = $request->descricao;
            $projeto->imagem = $request->imagem;
            $projeto->link = $request->link;
            $projeto->categoria_id = $request->categoria_id;

            $projeto->save();
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }
    }
    public function projectCreate()
    {
        $categorias = categorias::get();
        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if ($tipo == 2) {
            return view('/create', compact('tipo', 'categorias'));
        } else {
            return view('home');
        }
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
        $user = User::find(Auth::user()->id);
        $tipo = $user->type_user;
        if ($tipo == 2) {
            $categorias = categorias::get();
            $model = DB::table('projetos')
                ->join('categorias', 'categoria_id', '=', 'categorias.id')
                ->select('projetos.id', 'nome', 'nome_categoria', 'imagem', 'descricao', 'link')
                ->where("projetos.id", $id)
                ->first();
            return view('edit_project', compact('model', 'categorias', 'id'));
        }
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
        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if ($tipo == 2) {
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
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelUser = User::find(Auth::user()->id);
        $tipo = $modelUser->type_user;
        if ($tipo === 2) {
            $model = projetos::findOrFail($id);
            if ($model) {
                $model->delete();
                return redirect()->route('admin');
            } else {
                return redirect()->route('admin');
            }
        } else {
            return redirect()->route('home');
        }
    }
}
