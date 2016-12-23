<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Clientes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>
        <style>

        #tableContent ul{
            list-style: none;
            padding: 0;
            }
        #tableContent ul li{
            list-style: none;
            display: inline-block;
            margin-right: 20px;
            }
        #tableContent {
            width: 50%;
            height: auto;
            margin: 0px auto;
            display: block;
        }
        #tableContent ul li{
            list-style: none;
            display: inline-block;
        }
        #tableContent table {
            border-collapse: collapse;
            width: 100%;
            border:1px solid black;
        }
        .cajabusqueda{
            width:250px;
            border:solid 1px #000;
            padding:3px;
            }
        #displayC{
            width:250px;
            display:none;
            float:left; margin-right:30px;
            border-left:solid 1px #dedede;
            border-right:solid 1px #dedede;
            border-bottom:solid 1px #dedede;
            overflow:hidden;
        }
        #displayA{
            width:250px;
            display:none;
            float:left; margin-right:30px;
            border-left:solid 1px #dedede;
            border-right:solid 1px #dedede;
            border-bottom:solid 1px #dedede;
            overflow:hidden;
        }
        .responses{
            display: block;
            cursor: pointer;
        }
        .responsesA{
            display: block;
            cursor: pointer;
        }
        
        #labelBox{
            float: right;
            text-align: right;
        }
        .h2_abonos{
            text-align: center; 
            background:#1C9BF0; 
            color:white;
        }
        #mensualidades{
            width: 50%;
            height: auto;
            margin: 0px auto;
            margin-top: 10%;
            display: none;
            clear: both;
        }
         #mensualidades ul{
            padding: 0;
            list-style: none;
        }
        #mensualidades ul li{
            width: 15%;
            font-size: 10pt;
            margin-right: 30px;
            text-align: center;
            display: inline-block;
        }
        input[type=number]::-webkit-outer-spin-button,

		input[type=number]::-webkit-inner-spin-button {

		    -webkit-appearance: none;

		    margin: 0;
			}
		input[type=number] {

    		-moz-appearance:textfield;
			}
        </style>
    </head>
    <body>
       @include('layouts.menuNavBar')
       
    <div id="tableContent">
    <h2>Registro de Ventas</h2>
    <div>
        <ul style="list-style: none;">
            <li><label for="cliente">Cliente</label></li>
            <li>
                <input type="text" name="cliente" class="cajabusqueda" id="cajabusquedaC" />
                <label id="rfcCliente"></label><br />
                    <div id="displayC">
                    </div>

            </li>
        </ul>
    </div>
    <div style="border-bottom: 1px solid black; margin-bottom: 10px">
        <ul style="list-style: none;">
            <li><label for="Articulo">Articulo</label></li>
            <li>
                <input type="text" class="cajabusqueda" id="cajabusquedaA" name=""/><br />
                    <div id="displayA">
                    </div>
            </li>
            <li><button type="button" id="agregarArticulo">Agregar</button></li>
        </ul>
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
        <div style="float: right;"><button class="btnSuccess" id="siguienteFase" type="button" style="margin-left: 5px;">Siguiente</button>
     <a class="btnCancel" id="cancelar" href="ventas">Cancelar</a></div>
    </div>
    </div>


    <div id="mensualidades">
    <h2 class="h2_abonos">Abonos Mensuales</h2>
    
            <ul>
                <li>3 ABONOS DE</li>
                <li>X</li>
                <li>X</li>
                <li>X</li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>6 ABONOS DE</li>
                <li>X</li>
                <li>X</li>
                <li>X</li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>9 ABONOS DE</li>
                <li>X</li>
                <li>X</li>
                <li>X</li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
             <ul>
                <li>12 ABONOS DE</li>
                <li>X</li>
                <li>X</li>
                <li>X</li>
                <li><input type="radio" name="radioPlazo"></li>
            </ul>
    <button class="btnSuccess" id="guardarVenta" type="button" style="margin-left: 5px;">GUARDAR</button>
    <button class="btnCancel" id="cancelarMensualidades">Cancelar</button>

    </div>
    </body>
</html>
