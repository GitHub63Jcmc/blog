@extends('layouts.app2')

@section('title', 'Coders Free | Create Laravel 12')

@section('content')

    <x-container class="py-12" width="4xl">
        <x-alert type="danger" class="mb-32">
            <x-slot name="title">
                Título De Alerta:
            </x-slot>
            Cambie algunas cosas e intente enviarlo nuevamente.
        </x-alert>
    </x-container>

@endsection