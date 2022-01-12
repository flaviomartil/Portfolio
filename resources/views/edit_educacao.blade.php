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
                    <div class="panel-heading">Alterar Escolaridade</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/admin/educacao/update/{{ $escolaridade['id'] }}" method="post" role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="escola">Escola</label>
                                <input type="text" class="form-control" id="escola" name="escola" aria-describedby="escola"
                                    value="{{ $escolaridade['escola'] }}">

                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <textarea class="form-control" id="cidade"
                                    name="cidade">{{ $escolaridade['cidade'] }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="estado" class="form-control" id="estado" name="estado"
                                    value="{{ $escolaridade['estado'] }}">
                            </div>
                            <div class="form-group">
                                <label for="cargo">Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo"
                                    value="{{ $escolaridade['tipo'] }}">
                            </div>

                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input type="date" class="form-control" id="inicio" name="inicio"
                                    value="{{ $escolaridade['inicio'] }}">
                            </div>
                            <div class="form-group">
                                <label for="fim">Fim</label>
                                <input type="date" class="form-control" id="fim" name="fim"
                                    value="{{ $escolaridade['fim'] }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
