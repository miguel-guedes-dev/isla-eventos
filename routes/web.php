<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InicioController;

Route::get('/', [InicioController::class, 'index'])->name('inicio');

Route::get('/ola', function () {
    return ('Olá, DWDM!');
});

Route::get('/ola/{nome}', function ($nome) {
    return ('Ola ' . e($nome));
});

Route::get('/aluno/{nome}/{curso}', function ($nome, $curso) {
    return (e($nome) . ' está no curso de ' . e($curso));
});

Route::get('/saudacao/{nome?}', function (?string $nome = null) {
    return 'Bem vindo, ' . e($nome ?? 'visitante') . '!';
});

Route::get('/dobro/{numero}', function ($numero) {
    return 'O dobro de ' . e($numero) . ' é ' . e($numero * 2) . '.';
})->whereNumber('numero');

Route::get('/sobre', function () {
    return view('sobre');
});

$interesses = ['Laravel', 'MySql', 'git'];

Route::get('/perfil', function () use ($interesses) {
    return view('perfil', [
        'nome' => 'Ana Costa',
        'curso' => 'DWDM',
        'ano' => 2,
        'interesses' => $interesses,
    ]);
});

Route::get('/perfil/{interesse}', function ($interesse) use ($interesses) {
    if (in_array($interesse, $interesses)) {
        return $interesse . ' está na minha lista de interesses.';
    } else {
        return $interesse . ' não está na minha lista de interesses.';
    }
});


Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');


Route::get('/eventos/{id}', [EventoController::class, 'show'])
    ->whereNumber('id')
    ->name('eventos.show');

Route::get('/eventos/proximos', function () {
    $eventos = config('eventos');
    $hoje = date('Y-m-d');
    $proximos = array_filter($eventos, fn($evento) => $evento['data'] >= $hoje);
    usort($proximos, fn($a, $b) => $a['data'] <=> $b['data']);

    return view('eventos.index', [
        'eventos' => $proximos,
        'tipo' => null,
    ]);
});

Route::get('/eventos/tipo/{tipo}', [EventoController::class, 'porTipo'])
    ->name('eventos.tipo');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
