<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Articulos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>

    </head>
    <body>
       @include('layouts.menuNavBar')
       
    <div id="tableContent">
        <h2>Articulos Registrados</h2>
        <a href="agregarArticulo">Nuevo Articulo</a>
        <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Descripcion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if(isset($articulos))
            @foreach($articulos as $articulo)
            <tr>
                <td>{{$articulo->id}}</td>
                <td>{{$articulo->descripcion}}</td>
                <td><a href="editarArticulo?clave={{$articulo->id}}">Editar</a></td>
            </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </body>
</html>
