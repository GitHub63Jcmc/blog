<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Coders Free | Index Laravel 12</title> --}}
    <title>{{ $title ?? 'Jcmc | Welcome Laravel 12' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    {{ $slot }}

</body>
</html>