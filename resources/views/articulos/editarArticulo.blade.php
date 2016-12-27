<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        </style>
    </head>
    <body>
       @include('layouts.menuNavBar')
       <div id="agregarClienteForm">
       <form class="contact_form" action="editarArticulo" method="post">
    <ul class="ul_editar">
    @if($articulo)
        <li>
             <h2>Editar Articulo</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="clave" value="{{$articulo[0]->id}}">
        <li>
            <label class="labelClientForm" for="name">Descripcion:</label>
            <input type="text"  name="descripcion" value="{{$articulo[0]->descripcion}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="modelo">Modelo:</label>
            <input type="text" name="modelo" value="{{$articulo[0]->modelo}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="precio">Precio:</label>
            <input type="number" step="any" name="precio" min="0" value="{{$articulo[0]->precio}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="existencia">Existencia:</label>
            <input type="number" name="existencia"  min="0" value="{{$articulo[0]->existencia}}" required  />
        </li>
        <li>
        <button class="btnSuccess" type="submit">Guardar</button>
         <button class="btnCancel" type="button" id="cancelEditarArticulo">Cancelar</button>
        </li>
    </ul>
    @endif
</form>
    </div>
    </body>
</html>
