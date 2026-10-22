<!DOCTYPE html>
    <html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        <title>{{ $evento['titulo'] }}</title>
    </head>

    <body>
        <main class="container">
            <h1>{{ $evento['titulo'] }}</h1>
            <p>{{ 'Tipo: ' . $evento['tipo'] }}</p> 
            <p>{{ date('d/m/Y', strtotime($evento['data'])) }}</p>
            <p>{{ $evento['local'] }}</p>
            <p>{{ 'Inscritos: ' . $evento['inscritos'] . ' de ' . $evento['vagas']  }}</p>
            <a href="/eventos">Voltar aos Eventos</a>
            </main>
    </body>

    </html>
