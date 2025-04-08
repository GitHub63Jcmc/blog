<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coders Free | Index Laravel 12</title>

    <style>
        .color-red {
            color: red;
        } 
        .color-green {
            color: green;
        } 
    </style>
</head>
<body>
    <h1>Aquí se mostrará el LISTADO de POSTS</h1>

    <ul>
        @foreach ($posts as $post )
            <li @class([
                'color-red' => $loop->first,
                'color-green' => $loop->last,
            ])>
                <h2>
                    {{ $post['title']}}
                </h2>
                <p>{{$post['content']}}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>