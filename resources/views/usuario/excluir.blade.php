@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Excluir Usuario</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/usuario/listar') }}"> Pesquisa de Usuários</a></li>
            </ul>
        </div>
        <div class="title">
            <div class="title-body">

                <form action="{{ url('/usuario/excluir', $registro->id) }}" method="POST">
                    @csrf
                    @include('usuario.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Excluir
                        </button>
                        <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Exclusão de Usuario</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
