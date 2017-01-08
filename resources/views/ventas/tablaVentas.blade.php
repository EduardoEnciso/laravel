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
        <a href="nuevaVenta">
            <div id="agregar_content">
                <img src="{{url('images/add_icon.png')}}" alt="">
                <div id="ref_align">
                    <p>Nueva Venta</p>
                </div>
            </div>
        </a>
        <h2 class="title_h2">Ventas Activas</h2>
        <table>
        <thead>
            <tr>
                <th>Folio Venta</th>
                <th>Clave Cliente</th>
                <th>Nombre</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($ventas))
            @foreach($ventas as $venta)
            <tr>
               <td>{{$venta->idVenta}}</td>
               <td>{{$venta->idCliente}}</td>
               <td>{{$venta->nombre}} {{$venta->aPaterno}} {{$venta->aMaterno}}</td>
               
               <td>{{$venta->total}}</td>
               <td>{{$venta->fecha}}</td>
               <td>@if($venta->estatus == 0) Pendiente @else Pagado @endif</td>
            </tr>
            @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </body>
</html>
