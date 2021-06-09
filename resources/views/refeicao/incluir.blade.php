@extends('layouts.app')
@section('content')
    <div class="container">
        @include('refeicao.__apptitulo')
        <div class="title">
            <div class="title-body">
                <form action="{{ url('/refeicao/salvar') }}" method="POST">
                    @csrf
                    @include('refeicao.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados
                        </button>
                        <a href="{{ url('/refeicao/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão de refeicao</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
