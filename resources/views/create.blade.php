@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar projeto</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/admin/createNow" method="post" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                          <label for="nameProject">Nome do projeto</label>
                          <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Nome do seu projeto">

                        </div>
                        <div class="form-group">
                            <label for="descricaoProject">Descrição do projeto</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="emailHelp" placeholder="descrição do seu projeto">

                          </div>
                        <div class="form-group">
                          <label for="imagem">Local da imagem do seu projeto</label>
                          <input type="text" class="form-control" id="imagem" name="imagem" placeholder="imagem">
                        </div>
                        <div class="form-group">
                          <label for="imagem">Link do projeto</label>
                          <input type="text" class="form-control" id="link" name="link" placeholder="link">
                        </div>
                        <div class="form-group">
                        <select name="categoria_id" class="custom-select custom-select-lg mb-3">
                            <option  selected>Selecione a categoria</option>
                            @foreach($categorias as $categoria)
                            <option  value="{{$categoria->id}}">{{$categoria->nome_categoria}}</option>
                          @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Criar Projeto</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
