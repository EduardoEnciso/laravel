<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        </style>
    </head>
    <body>
       @include('layouts.menuNavBar')
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
            <input type="text" name="precio" required />
        </li>
        <li>
            <label class="labelClientForm" for="existencia">Existencia:</label>
            <input type="text" name="existencia" required  />
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
