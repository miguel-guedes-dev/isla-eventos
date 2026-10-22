<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{{ $nome }}</h1>
    <p>Curso: {{ $curso }} . {{ $ano }}.º ano</p>
    <h2>Interesses {{ count($interesses) }}</h2>
    @if ($ano == 2)
        <p>Estás no último ano do CTeSP.</p>
    @endif

    <ul>
        @foreach ($interesses as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>


</body>

</html>
