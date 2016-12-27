<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vendimia</title>

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
        #folioCliente{
            float:right;
            color:green;
            margin-right: 25%;
        }
        </style>
    </head>
    <body>
       @include('layouts.menuNavBar')
    <div>
        <h4 id="folioCliente">Folio</h4>
    </div>
       <div id="agregarClienteForm">
       <form class="contact_form" action="agregarCliente" method="post">
    <ul class="ul_editar">
        <li>
             <h2>Registro de Clientes</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <li>
            <label class="labelClientForm" for="name">Nombre:</label>
            <input type="text"  name="nombre" required />
        </li>
        <li>
            <label class="labelClientForm" for="aPaterno">Apellido Paterno:</label>
            <input type="text" name="aPaterno" required />
        </li>
        <li>
            <label class="labelClientForm" for="aMaterno">Apellido Materno:</label>
            <input type="text" name="aMaterno" required />
        </li>
        <li>
            <label class="labelClientForm" for="Mensaje">RFC:</label>
            <input type="text" name="RFC" required  />
        </li>
        <li>
         
         <button class="btnSuccess" type="submit">Guardar</button>
         <button class="btnCancel" type="button" id="cancelNuevoCliente">Cancelar</button>
        </li>
    </ul>
</form>
    </div>
    </body>
</html>
