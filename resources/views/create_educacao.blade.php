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
                    <div class="panel-heading">Adicionar Experiência</div>

                    <div class="panel-body">

                        <form action="/admin/educacao/create" method="post" role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="empresa">Escola</label>
                                <input type="text" class="form-control" id="escola" name="escola" aria-describedby="escola"
                                    value="">

                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <textarea class="form-control" id="cidade" name="cidade"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="estado" class="form-control" id="estado" name="estado" value="">
                            </div>
                            <div class="form-group">
                                <label for="cargo">Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" value="">
                            </div>

                            <div class="form-group">
                                <label for="inicio">Inicio</label>
                                <input type="date" class="form-control" id="inicio" name="inicio" value="">
                            </div>
                            <div class="form-group">
                                <label for="fim">Fim</label>
                                <input type="date" class="form-control" id="fim" name="fim" value="">
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
