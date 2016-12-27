<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Nuevo Articulo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>

        <style>
        .labelClientForm{
            display: inline-block;
            width: 120px;
            text-align: right;
        }
        #folioArticulo{
            float:right;
            color:green;
            margin-right: 25%;
        }
        </style>
    </head>
    <body>
       @include('layouts.menuNavBar')
       <div>
        <h4 id="folioArticulo">Folio</h4>
    </div>
       <div id="agregarClienteForm">
       <form class="contact_form" action="agregarArticulo" method="post">
    <ul class="ul_editar">
        <li>
             <h2>Registro de Articulos</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <li>
            <label class="labelClientForm" for="descripcion">Descripcion:</label>
            <input type="text"  name="descripcion" required />
        </li>
        <li>
            <label class="labelClientForm" for="modelo">Modelo:</label>
            <input type="text" name="modelo" required />
        </li>
        <li>
            <label class="labelClientForm" for="precio">Precio:</label>
            <input type="number" step="any" min="0" name="precio" required />
        </li>
        <li>
            <label class="labelClientForm" for="existencia">Existencia:</label>
            <input type="number" min="0" name="existencia" required  />
        </li>
        <li>
         
         <button class="btnSuccess" type="submit">Guardar</button>
         <button class="btnCancel" type="button" id="cancelNuevoArticulo">Cancelar</button>
        </li>
    </ul>
</form>
    </div>
    </body>
</html>
