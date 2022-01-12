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
                    <div class="panel-heading">Alterar Fluxo de trabalho</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="/admin/EditFluxoTrabalhos/update" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <i id="teste" class="fas fa-plus-square">
                                    <label for="detalhe">Competências</label> </i>
                                @if (count($fluxoTrabalhos))
                                    @foreach ($fluxoTrabalhos as $fluxo)
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                name="detalhes['{{ $fluxo->id + 10 }}']" aria-describedby="nome"
                                                value="{{ $fluxo->detalhes }}">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="detalhes['0']"
                                            aria-describedby="nome" value="">
                                    </div>
                                @endif
                            </div>
                            <div id="detalhesArea">
                            </div>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            <a class="btn btn-danger" id="zeraDetalhes">Apagar Detalhes</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var Conta = $('input[name*="detalhes"]').length;
        $('#zeraDetalhes').on('click', function() {
            $('input[name^="detalhes"]').remove();
            Conta = 0;
        });
        $('#teste').on('click', function() {
            if (Conta >= 4) {
                toastr.error('O limite são 4 competências');
            } else {
                Conta++;
                $('#detalhesArea').append(
                    `<div class="form-group"><input type="text" class="form-control" name="detalhes['${Conta}']"></div>`
                );
            }
        });
    </script>
    <!-- Toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
    <!-- Toast js Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
@endsection
