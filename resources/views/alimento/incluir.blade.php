@extends('layouts.app')
@section('content')
    <div class="container">
        @include('alimento.__apptitulo')
        <div class="title">
            <div class="title-body">
                <form action="{{ url('/alimento/salvar') }}" method="POST">
                    @csrf
                    @include('alimento.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados
                        </button>
                        <a href="{{ url('/alimento/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão de Alimento</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
