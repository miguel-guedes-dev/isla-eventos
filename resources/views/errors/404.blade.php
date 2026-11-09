@extends('layouts.app')

@section('titulo', 'Página não encontrada')

@section('conteudo')
    <h1>404 - Página não encontrada</h1>
    <a href="{{ route('eventos.index') }}">Voltar aos eventos</a>
@endsection