@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div class="panel-heading">Alterar Sobre Mim</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/admin/EditAbout/update" method="post" role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome"
                                    value="{{ $about->nome }}">
                            </div>

                            <div class="form-group">
                                <label for="nome">Mensagem topo</label>
                                <input type="text" class="form-control" id="msgTopo" name="msgTopo"
                                    aria-describedby="nome" value="{{ $about->msgTopo }}">
                            </div>

                            <div class="form-group">
                                <label for="nome">Mensagem Digitada/Apagada</label>
                                <input type="text" class="form-control" id="msgDigitada" name="msgDigitada"
                                    aria-describedby="nome" value="{{ $about->msgDigitada }}">
                            </div>

                            <div class="form-group">
                                <label for="nome">Mensagem Principal</label>
                                <input type="text" class="form-control" id="msgPrincipal" name="msgPrincipal"
                                    aria-describedby="nome" value="{{ $about->msgPrincipal }}">
                            </div>

                            <div class="form-group">
                                <label for="website">Website</label>
                                <textarea class="form-control" id="website" name="website"
                                    aria-describedby="emailHelp">{{ $about->website }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="celphone" class="form-control" id="telefone" name="telefone"
                                    value="{{ $about->telefone }}">
                            </div>
                            <div class="form-group">
                                <label for="cidade_atual">Cidade atual</label>
                                <input type="text" class="form-control" id="cidade_atual" name="cidade_atual"
                                    value="{{ $about->cidade_atual }}">
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input type="number" class="form-control" id="idade" name="idade"
                                    value="{{ $about->idade }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $about->email }}">
                            </div>
                            <div class="form-group">
                                <label for="email_profissional">Email profissional</label>
                                <input type="text" class="form-control" id="email_profissional" name="email_profissional"
                                    value="{{ $about->email_profissional }}">
                            </div>
                            <div class="form-group">
                                <label for="freelance_status">Freelance status</label>
                                <input type="text" class="form-control" id="freelance_status" name="freelance_status"
                                    value="{{ $about->freelance_status }}">
                            </div>
                            <div class="form-group">
                                <label for="aniversario">Aniversário</label>
                                <input type="date" class="form-control" id="aniversario" name="aniversario"
                                    value="{{ $about->aniversario }}">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco"
                                    value="{{ $about->endereco }}">
                            </div>
                            <div class="form-group">
                                <label for="cep">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="{{ $about->cep }}">
                            </div>
                            <div class="form-group">
                                <label for="resumo">Resumo</label>
                                <input type="text" class="form-control" id="resumo" name="resumo"
                                    value="{{ $about->resumo }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Alterar Projeto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
