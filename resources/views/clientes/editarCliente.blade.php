<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vendimia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/js.js"></script>

    </head>
    <body>
       @include('layouts.menuNavBar')
       <div id="agregarClienteForm">
       <form class="contact_form" action="editarCliente" method="post">
    <ul class="ul_editar">
    @if($cliente)
        <li>
             <h2>Editar Cliente</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="clave" value="{{$cliente[0]->id}}">
        <li>
            <label class="labelClientForm" for="name">Nombre:</label>
            <input type="text"  name="nombre" value="{{$cliente[0]->nombre}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="aPaterno">Apellido Paterno:</label>
            <input type="text" name="aPaterno" value="{{$cliente[0]->aPaterno}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="aMaterno">Apellido Materno:</label>
            <input type="text" name="aMaterno" value="{{$cliente[0]->aMaterno}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="Mensaje">RFC:</label>
            <input type="text" name="RFC" value="{{$cliente[0]->RFC}}" required  />
        </li>
        <li>
        <button class="btnSuccess" type="submit">Guardar</button>
        <button class="btnCancel" type="button" id="cancelEditarCliente">Cancelar</button>
        </li>
    </ul>
    @endif
</form>
    </div>
    </body>
</html>
