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

    @if (false)
        <p>Este mensaje se mostrará si el valor de la condicional es VERDADERO</p>
    @else
        <p>Este mensaje se mostrará si el valor de la condicional es FALSO</p>
    @endif
    
    @unless (false)
        <p>Le has pasado el valor de false a la directiva UNLESS</p>
    @endunless

    @isset($prueba)
        <p>La variable <span style="color: red; padding: 10px; margin: 10px; background-color: blue; border-radius: 8px"> " {{$prueba}} " </span>  existe y tiene un valor asignado</p>
        @else
        <p>La variable <span style="color: blue; padding: 10px; margin: 10px; background-color: red; border-radius: 8px"> " {{$prueba}} " </span> No existe o NO tiene un valor asignado.</p>
    @endisset

    @empty($valor_null)
        <p>La variable <span style="color: blue; padding: 10px; margin: 10px; background-color: red; border-radius: 8px"> " {{$valor_null}} " </span> No existe o NO tiene un valor asignado, Joao.</p>
    @endempty
</body>
</html>