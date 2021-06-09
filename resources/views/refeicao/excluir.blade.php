@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Excluir refeicao</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/refeicao/listar') }}"> Pesquisa de refeicao</a></li>
            </ul>
        </div>
        <div class="title">
            <div class="title-body">

                <form action="{{ url('/refeicao/excluir', $registro->id) }}" method="POST">
                    @csrf
                    @include('refeicao.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Excluir
                        </button>
                        <a href="{{ url('/refeicao/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Exclusão de refeicao</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
