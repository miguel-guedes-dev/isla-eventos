<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Eventos</title>
</head>

<body>
    <main class="container">
        <h1>Eventos</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Data</th>
                    <th>Vagas Livres</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($eventos as $evento)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $evento['titulo'] }}</td>
                        <td>{{ date('d/m/Y', strtotime($evento['data'])) }}</td>
                        <td>
                            @if ($evento['inscritos'] >= $evento['vagas'])
                                <strong>Esgotado</strong>
                            @else
                                {{ $evento['vagas'] - $evento['inscritos'] }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não há eventos para mostrar</td>
                    </tr>
                @endforelse

            </tbody>
        </table>


    </main>
</body>

</html>
