@extends('layouts.app2')

@section('title', 'Coders Free | Index Laravel 12')

@push('meta')
    <meta name="description" content="Cursos de Programación grátis">
@endpush

@section('content')

    <x-container class="py-12" width="4xl">
        <x-alert type="danger" class="mb-32">
            <x-slot name="title">
                Título De Alerta:
            </x-slot>
            Cambie algunas cosas e intente enviarlo nuevamente.
        </x-alert>

        <h1>Index</h1>
    </x-container>
    
@endsection
