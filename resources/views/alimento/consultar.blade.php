@extends('layouts.app')
@section('content')
    <div class="container">
        @include('alimento.__apptitulo')
        <div class="title">
            <div class="title-body">
                <form action="{{url('alimento/listar')}}" method="GET">
                    @csrf
                    @include('alimento.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Consultar
                        </button>
                        <a href="{{ url('/alimento/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Consulta de Alimento</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
