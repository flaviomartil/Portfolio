@extends('layouts.app')

@section('content')

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><font color="red">Você está logado no painel de administrador</font></center>


                <div class="panel-body">
                    @if (session('status'))
                    @if($type_user == 2)
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                    @endif

                   <div class="row">
                   <div class="container">
                   <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Link</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($meusProjetos as $projeto)
                      <tr>
                        <th scope="row">{{$projeto->id}}</th>

                        <td>{{$projeto->nome}}</td>
                        <td>{{$projeto->descricao}}</td>
                        <td>{{$projeto->nome_categoria}}</td>
                        <td>{{$projeto->imagem}}</td>
                        <td>{{$projeto->link}}</td>
                        <td><a class="btn btn-warning" href="/admin/editar/{{$projeto->id}}" role="button">Editar !</a><a class="btn btn-danger" href="/admin/delete/{{$projeto->id}}" role="button">Deletar</a></td>
                      </tr>
                      @endforeach

                   <br><a class="btn btn-primary" href="{{url ('/admin/CreateProject')}}" role="button">Criar projeto</a>
                   <a class="btn btn-warning" href="{{url ('/admin/EditAbout')}}" role="button">Editar Sobre mim</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
