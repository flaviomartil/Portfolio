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
                    <div class="panel-heading">Alterar Experiência</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/admin/experiencias/update/{{ $empresas['id'] }}" method="post" role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="empresa">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa"
                                    aria-describedby="empresa" value="{{ $empresas['empresa'] }}">

                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <textarea class="form-control" id="cidade"
                                    name="cidade">{{ $empresas['cidade'] }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="estado" class="form-control" id="estado" name="estado"
                                    value="{{ $empresas['estado'] }}">
                            </div>
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control" id="cargo" name="cargo"
                                    value="{{ $empresas['cargo'] }}">
                            </div>

                            <div class="form-group">
                                <label for="inicio">Inicio na empresa</label>
                                <input type="date" class="form-control" id="inicio" name="inicio"
                                    value="{{ $empresas['inicio'] }}">
                            </div>
                            <div class="form-group">
                                <label for="fim">Fim na empresa</label>
                                <input type="date" class="form-control" id="fim" name="fim"
                                    value="{{ $empresas['fim'] }}">
                            </div>
                            <i id="teste" class="fas fa-plus-square">
                                <label for="detalhe">Detalhes</label> </i>
                            @foreach ($empresas['detalhes'] as $detalhe)
                                <div class="form-group">
                                    <input type="text" class="form-control" name="detalhe['{{ $detalhe }}']"
                                        value="{{ $detalhe }}">
                                </div>
                            @endforeach
                            <div id="detalhesArea">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var Conta = 0;
        $('#teste').on('click', function() {
            Conta++;
            $('#detalhesArea').append(
                `<div class="form-group"><input type="text" class="form-control" name="detalhe['${Conta}']"></div>`
            );
        });
    </script>

@endsection
