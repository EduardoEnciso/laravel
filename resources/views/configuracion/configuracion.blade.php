<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Configuracion</title>

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

       @if(isset($messageCode))
            @if($messageCode == 1)
                <div class="success">Bien Hecho. La configuración ha sido registrada</div>
            @endif
      @endif
       <div id="agregarClienteForm">
      
    @if(isset($configuracion))
<form class="contact_form" action="" method="post">
    <ul class="ul_editar">
        <li>
             <h2>Configuracion General</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="clave" value="{{{ $configuracion[0]->id }}}" />
        <input type="hidden" name="editar" value="" />

        <li>
            <label class="labelClientForm" for="tasaFinanciamiento">Tasa Financiamiento:</label>
            <input type="text"  name="tasaFinanciamiento" value="{{$configuracion[0]->tasaFinanciamiento}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="enganche">% Enganche:</label>
            <input type="text" name="enganche" value="{{$configuracion[0]->enganche}}" required />
        </li>
        <li>
            <label class="labelClientForm" for="plazoMaximo">Plazo Maximo:</label>
            <input type="text" name="plazoMaximo" value="{{$configuracion[0]->plazoMaximo}}" required />
        </li>
        <li>
        <button class="btnSuccess" type="submit">Guardar</button>
         <a class="btnCancel" href="inicio">Cancelar</a>
        </li>
    </ul>
</form>
         @else
<form class="contact_form" action="" method="post">
    <ul>
        <li>
             <h2>Configuracion General</h2>
        </li>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="nuevo" value="" />

        <li>
            <label for="tasaFinanciamiento">Tasa Financiamiento:</label>
            <input type="text"  name="tasaFinanciamiento" value="" required />
        </li>
        <li>
            <label for="enganche">% Enganche:</label>
            <input type="text" name="enganche" value="" required />
        </li>
        <li>
            <label for="plazoMaximo">Plazo Maximo:</label>
            <input type="text" name="plazoMaximo" value="" required />
        </li>
        <li>
        <button class="btnSuccess" type="submit">Guardar</button>
         <button class="btnCancel" type="button" id="cancelConfig">Cancelar</button>
        </li>
    </ul>
</form>
    @endif
        

    </div>
    </body>
</html>
