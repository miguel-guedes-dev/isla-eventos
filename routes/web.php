<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

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

$eventos = [
    ['id' => 1, 'titulo' => 'Workshop de Laravel', 'tipo' => 'workshop',
'data' => '2026-10-14', 'local' => 'Laboratório 2.05', 'vagas' => 20, 'inscritos' => 12],
    ['id' => 2, 'titulo' => 'Palestra: Carreiras em Cibersegurança', 'tipo' => 'palestra',
'data' => '2026-10-21', 'local' => 'Auditório', 'vagas' => 120, 'inscritos' => 120],
    ['id' => 3, 'titulo' => 'Hackathon ISLA 24h', 'tipo' => 'hackathon',
'data' => '2026-11-06', 'local' => 'Átrio principal', 'vagas' => 60, 'inscritos' => 41],
    ['id' => 4, 'titulo' => 'Git e Github para iniciantes', 'tipo' => 'workshop',
'data' => '2026-09-30', 'local' => 'Laboratório 1.02', 'vagas' => 25, 'inscritos' => 25],
    ['id' => 5, 'titulo' => 'Conversa com antigos alunos DWDM', 'tipo' => 'palestra',
'data' => '2026-12-02', 'local' => 'Sala 3.10', 'vagas' => 40, 'inscritos' => 9],
    ['id' => 6, 'titulo' => 'Workshop de Flutter', 'tipo' => 'workshop',
'data' => '2026-12-25', 'local' => 'Casa do Pai Natal', 'vagas' => 250, 'inscritos' => 300],
];

Route::get('/eventos', function () use ($eventos) {
    $tipo = request('tipo');

    if ($tipo) {
        $eventos = array_filter($eventos,
        fn ($evento) => $evento['tipo'] === $tipo);
    }
    return view('eventos.index', [
        'eventos' => $eventos,
        'tipo' => $tipo,
    ]);
});

Route::get('/eventos/{id}', function (int $id) use ($eventos) {
    $evento = null;

    foreach ($eventos as $item) {
        if ($item['id'] === $id) {
            $evento = $item;
        }
    }

    if ($evento === null) {
        abort(404);
    }

    return view('eventos.show', ['evento' => $evento]);
}) ->whereNumber('id');