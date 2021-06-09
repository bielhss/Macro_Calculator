@extends('layouts.app')
@section('content')
    <div class="container">
        @include('usuario.__apptitulo')
        <div class="title">
            <div class="title-body">
                <form action="{{ url('/usuario/salvar') }}" method="POST">
                    @csrf
                    @include('usuario.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados
                        </button>
                        <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão de usuario</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
