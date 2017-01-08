<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Clientes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>

    </head>
    <body>
       @include('layouts.menuNavBar')
       
    <div id="tableContent">
        <a href="agregarCliente">
            <div id="agregar_content">
                <img src="{{url('images/add_icon.png')}}" alt="">
                <div id="ref_align">
                    <p>Nuevo Cliente</p>
                </div>
            </div>
        </a>
        <h2 class="title_h2">Clientes Registrados</h2>
        <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if(isset($clientes))
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}} {{$cliente->aPaterno}} {{$cliente->aMaterno}}</td>
                <td>
                    <a href="editarCliente?clave={{$cliente->id}}">
                        <div class="edit_icon"><img src="{{url('images/edit_icon.png')}}" alt=""></div>
                    </a>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </body>
</html>
