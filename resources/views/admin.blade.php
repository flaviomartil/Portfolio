@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                    @if($type_user == 2)
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                    @endif

                   Você está logado no painel de administrador
                   <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Link</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($meusProjetos as $projeto)
                      <tr>
                        <th scope="row"></th>
                        <td>{{$projeto->nome}}</td>
                        <td>{{$projeto->descricao}}</td>
                        <td></td>
                        <td>{{$projeto->link}}</td>
                      </tr>
                      @endforeach

                   <br><a class="btn btn-primary" href="{{url ('/admin/CreateProject')}}" role="button">Criar projeto</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
