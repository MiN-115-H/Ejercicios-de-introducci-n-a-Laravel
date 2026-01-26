@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ $pelicula->poster }}" style="height:500px" />
        </div>
        <div class="col-sm-8">
            <h1>{{ $pelicula->title }}</h1>
            <br>
            <p>Año: {{ $pelicula->year }}</p>
            <p>Director: {{ $pelicula->director }}</p>
            <br>
            <p><strong>Resumen:</strong> {{ $pelicula->synopsis }}</p>
            <br>
            @if ($pelicula->rented)
                <p><strong>Estado:</strong> Alquilada</p>
            @else
                <p><strong>Estado:</strong> Disponible</p>
            @endif
            <br>
            <div class="d-flex gap-2 align-items-center">
                @if ($pelicula->rented)
                    <form action="{{ route('catalog.return', ['id' => $pelicula->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger">Devolver película</button>
                    </form>
                @else
                    <form action="{{ route('catalog.rent', ['id' => $pelicula->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success">Alquilar pelicula</button>
                    </form>
                @endif
                <br>
                <button class="btn btn-warning"
                    onclick="window.location.href='{{ route('catalog.edit', ['id' => $pelicula->id]) }}'">Editar
                    película</button>
                <button class="btn btn-light" onclick="window.location.href='{{ route('catalog.index') }}'">Volver al
                    listado</button>
            </div>
        </div>
    </div>
@stop
