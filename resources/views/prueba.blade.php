<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paginación | Prueba</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
    <div class="mx-5">
        <h1>Usuarios</h1>
    
        <ul class="mx-3">
            @foreach ($users as $user)
    
                <li>
                    {{ $user->name }}
                </li>
                
            @endforeach
        </ul>
    
        {{ $users->links()}}
    </div>
</body>
</html>