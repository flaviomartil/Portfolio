<?php

namespace App\Http\Controllers;

use App\projetos;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\categorias;
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
        //
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
        if($tipo == 2){
            $projeto = new projetos();

            $projeto->nome = $request->nome;
            $projeto->descricao = $request->descricao;
            $projeto->imagem = $request->imagem;
            $projeto->link = $request->link;
            $projeto->categoria_id = $request->categoria_id;

            $projeto->save();
            return redirect()->route('admin');

        }else{
            return redirect()->route('home');
        }
    }
    public function projectCreate()
    {
        $categorias = categorias::get();

        $model = User::find(Auth::user()->id);
        $tipo = $model->type_user;
        if($tipo == 2){
            return view('/create',compact('tipo','categorias'));
        }else{
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        if($tipo === 2){
        $model = projetos::findOrFail($id);
        if($model){
        $model->delete();
        return redirect()->route('admin');

    }else{
        return redirect()->route('admin');
    }
}else {
    return redirect()->route('home');
}
    }

    }

