@extends('layouts.master')

@section('content')
    <div class="mensaje">
        @if (Auth::user()->email === 'admin@videoclub.com')
            Bienvenido al Videoclub jefe.
        @else
            Bienvenido al Videoclub {{ Auth::user()->name }}
        @endif
    </div>

    <style>
        .mensaje {
            font-size: 3em;
        }
    </style>
@stop
