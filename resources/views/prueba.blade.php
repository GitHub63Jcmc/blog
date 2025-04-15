<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Usuarios</h1>

    <ul>
        @foreach ($users as $user)

            <li>
                {{ $user->name }}
            </li>
            
        @endforeach
    </ul>
</body>
</html>