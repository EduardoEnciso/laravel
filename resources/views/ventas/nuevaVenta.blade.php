<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Clientes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>
    </head>
    <body>
       @include('layouts.menuNavBar')
    <div id="content">
    <h2 id="title_content">Registro de Ventas</h2>
    <h4 id="folioVenta"></h4>
    
    <div id="seccion1">
    
            <div class="seccion1_a"><p>Cliente</p></div>
            <div class="seccion1_b">
                <input type="text" placeholder="Buscar Cliente..." name="cliente" class="cajabusqueda" id="cajabusquedaC" />
                <div id="displayC"></div>
            </div>
            <div class="seccion1_c" id="rfcCliente"></div>
                    
        
    </div>
    <div id="seccion2">
    
            <div class="seccion2_a"><p>Articulo</p></div>
            <div class="seccion2_b">
                <input type="text" placeholder="Buscar Articulo..." class="cajabusqueda" id="cajabusquedaA" name=""/>
                <div id="displayA"></div>
            </div>
            <div class="seccion2_c">
                <button type="button" id="agregarArticulo"></button>
            </div>
    </div>
        
   <table>
        <thead>
            <tr>
                <th>Descripcion Articulo</th>
                <th>Modelo</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Importe</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="articulosEncontrados">
       
        </tbody>
    </table>
    <div id="labelBox">
        <ul>
            <li style="display: block;" id="enganche">0.00</li>
            <li style="display: block;" id="bonificacion">0.00</li>
            <li style="display: block;" id="total">0.00</li>
        </ul>
    </div>
    <div id="labelBox">
        <ul >
            <li style="display: block;">Enganche:</li>
            <li style="display: block;">Bonificacion Enganche:</li>
            <li style="display: block;">Total:</li>
        </ul>
        
    </div>
    <div id="seccion3">
        <button class="btnSuccess" id="siguienteFase" type="button" style="margin-left: 5px;">Siguiente</button>
        <button class="btnCancel" id="cancelarNuevaVenta" href="ventas">Cancelar</button>
    </div>
    </div>


    <div id="mensualidades">
    <h2 class="h2_abonos">ABONOS MENSUALES</h2>
    
            <ul>
                <li>3 ABONOS DE</li>
                <li></li>
                <li></li>
                <li></li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>6 ABONOS DE</li>
                <li></li>
                <li></li>
                <li></li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>9 ABONOS DE</li>
                <li></li>
                <li></li>
                <li></li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>12 ABONOS DE</li>
                <li></li>
                <li></li>
                <li></li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
    <div style="margin-top: 10px;">
        <button class="btnSuccess" id="guardarVenta" type="button" style="margin-left: 5px;">GUARDAR</button>
        <button class="btnCancel" id="cancelarMensualidades">Cancelar</button>
    </div>

    </div>
    </body>
</html>
