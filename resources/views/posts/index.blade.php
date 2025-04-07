<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coders Free | Index Laravel 12</title>
</head>
<body>
    <h1>Aquí se mostrará el LISTADO de POSTS</h1>

    <ul>
        @forelse ($posts as $post)
            <li>
                <h2>{{ $post ['title'] }}</h2>
                <p>{{ $post ['content'] }}</p>
            </li>
        @empty
            <li style="color: red; font-size: 20px; text-align: center; background:black; font-weight: bold; padding: 10px 10px; border-radius: 8px; border: solid red 5px">
                <h2>No hay datos</h2>
            </li>
        @endforelse
    </ul>



</body>
</html>