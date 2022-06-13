@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/datatable.min.js') }}"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

@section('content')
    @if (isset($sucess))
        <div class="alert alert-danger" role="alert">
            {{ $sucess->first() }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label id="adminLabel">Painel de Escolaridade</label>
                    <div id="botoes" class="float-right" style="margin-bottom: 10px;">
                        <a class="btn btn-primary" href="{{ url('/admin/createEducacao') }}" role="button">Adicionar</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover responsive display" style="width:100%" id="tableEducacao">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Escola</th>
                                    <th>Cidade</th>
                                    <th>Estado </th>
                                    <th>Tipo</th>
                                    <th>Inicio</th>
                                    <th>Fim</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .toast-error {
        background-color: #BD362F !important;
        font-size: 15.6px;
    }

    .toast-success {
        background-color: green !important;
        font-size: 15.6px;
    }

    #adminLabel {
        display: block;
        text-align: center;
        color: #BD362F;
    }

    .td {
        word-wrap: break-word;
        overflow-wrap: anywhere;
        width: 100%;
    }

    table {
        table-layout: fixed;
        width: 100%;
    }

    table td {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
</style>
<script src="{{ asset('js/educacao.js') }}"></script>
<!-- Toast CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" />
<!-- Toast js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
crossorigin="anonymous"></script>
