$(document).ready(function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Variables de configuracion
var configPlazoMaximo=0;
var configTasaFinanciamiento=0;
var configEnganche=0;
var plazoMaximo=0;
var tasaFinanciamiento=0;
var enganche=0;
/////////////////////////////////////FECHA//////////////////////////////////////////
var date=new Date();
var dia = date.getDate();
var mes = date.getMonth();
var año = date.getFullYear();
$("#fecha").text("Fecha: "+dia+"/"+(mes+1)+"/"+año);
/////////////////////////////////////CLIENTES/////////////////////////////////////////////////////////////////////////////////

$("#cancelEditarCliente").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="clientes";

}
});
$("#cancelNuevoCliente").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="clientes";

}
});
///////OBTENER FOLIO DEL CLIENTE///////////////
$.ajax({
	    type: "post",
	    cache: false,
	    url: "obtenerFolioCliente",
	})
	 .done(function(data) {
	 	console.log(data);
	 	$("#folioCliente").text("Folio Cliente: "+(data[0].id+1));
	 })
	 .fail(function(data) {
	    
	});
///////////////////////////////////FIN CLIENTES///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////CONFIGURACION///////////////////////////////////////////////////////////////////////////////

$("#cancelConfig").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="inicio";

}
});
///////////////////////////////////FIN CONFIGURACION///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////ARTICULOS///////////////////////////////////////////////////////////////////////////////

$("#cancelEditarArticulo").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="articulos";

}
});
$("#cancelNuevoArticulo").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="articulos";

}
});

///////OBTENER FOLIO DEL ARTICULO///////////////
$.ajax({
	    type: "post",
	    cache: false,
	    url: "obtenerFolioArticulo",
	})
	 .done(function(data) {
	 	console.log(data);
	 	$("#folioArticulo").text("Folio Articulo: "+(data[0].id+1));
	 })
	 .fail(function(data) {
	    
	});
///////////////////////////////////FIN ARTICULOS///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////VENTAS///////////////////////////////////////////////////////////////////////////////
$("#cancelarNuevaVenta").click(function(){
var com= confirm("¿Desea salir de la pantalla actual?");
if(com == true){
window.location.href="ventas";

}
});

//Obtener configuracion
function obtenerConfig(){
	$.ajax({
	    type: "post",
	    cache: false,
	    url: "obtenerConfig",
	})
	 .done(function(data) {
	 	configPlazoMaximo = data[0].plazoMaximo;
	 	configTasaFinanciamiento = data[0].tasaFinanciamiento; 
	 	configEnganche= data[0].enganche;

	 	plazoMaximo = data[0].plazoMaximo;
	 	tasaFinanciamiento = data[0].tasaFinanciamiento; 
	 	enganche= data[0].enganche;
	 	parseFloat(plazoMaximo);
	 	parseFloat(tasaFinanciamiento);
		parseFloat(enganche);
	 })
	 .fail(function(data) {
	    
	});
}

////////////////LIMPIAR CAJA DE BUSQUEDA DE CLIENTE////////////
$("#cajabusquedaC").click(function(){
	
$(this).val("");
$("#rfcCliente").text("");
});





///////////////////BUSCADOR DE CLIENTES////////////////////////
$("#cajabusquedaC").keyup(function(e){
if($(this).val() == ""){
$("#displayC").html("");
$("#rfcCliente").html("");
	}
if($(this).val().length > 2){
	
$.ajax({
    data: {"key": $(this).val()},
    type: "post",
    cache: false,
    url: "buscarCliente",
})
 .done(function(data) {
 	console.log(data);
 	$("#displayC").html("");
 	$("#displayC").css("display","block");
 	var size = Object.keys(data).length;
if(size > 0){
 	for(var i = 0; i < size; i++ ){
 		$("#displayC").append("<span class='responses' data-clave='"+data[i].id+"' data-rfc='"+data[i].RFC+"'>"+data[i].nombre+
 			" "+data[i].aPaterno+" "+data[i].aMaterno+"</span");
	}
}
else{
	$("#displayC").html("");
	$("#displayC").css("display","none");

}
 })
 .fail(function(data) {
    
});
}

});

$("body").on("click",".responses",function(){
$("#cajabusquedaC").val($(this).data("clave")+" - "+$(this).text());
$("#rfcCliente").text("RFC: "+$(this).data("rfc"));
$("#displayC").html("");
});

///////////////////OBTENER FOLIO DE VENTA/////////////////////////////
$.ajax({
	    type: "post",
	    cache: false,
	    url: "obtenerFolioVenta",
	})
	 .done(function(data) {
	 	console.log(data);
	 	$("#folioVenta").text("Folio Venta: "+(data[0].id+1));
	 })
	 .fail(function(data) {
	    
	});
///////////////////BUSCADOR DE ARTICULOS////////////////////////
$("#cajabusquedaA").keyup(function(e){
if(e.keyCode == 8){
	$(this).attr("name","");
}

if($(this).val() == ""){
$("#displayA").html("");
}
	if($(this).val().length > 2){
	$.ajax({
	    data: {"key": $(this).val()},
	    type: "post",
	    cache: false,
	    url: "buscarArticulo",
	})
	 .done(function(data) {
	 	console.log(data);
	 	$("#displayA").html("");
	 	$("#displayA").css("display","block");
	 	var size = Object.keys(data).length;
	if(size > 0){
	 	for(var i = 0; i < size; i++ ){
	 		$("#displayA").append("<span class='responsesA' data-clave='"+data[i].id+"'>"+data[i].descripcion+"</span>");
		}
	}
	else{
		$("#displayA").html("");
		$("#displayA").css("display","none");

	}
	 })
	 .fail(function(data) {
	    
	});
	}

});

$("body").on("click",".responsesA",function(){
$("#cajabusquedaA").val($(this).text());
$("#displayA").html("");
$("#cajabusquedaA").attr("name",$(this).data("clave"));
});

//Agregar Articulo a la tabla
$("#agregarArticulo").click(function(){
	obtenerConfig();
//variables de configuracion
//variables del articulo
var coindicencia;
var clave=$("#cajabusquedaA").attr("name");
var size= $("#articulosEncontrados").find("tr").length;
if(size > 0){
	$("#articulosEncontrados").html("");
	
}

if($("#cajabusquedaA").val() == ""){
alert("Caja de texto vacia");
return false;
}
if(clave == ""){
	alert("No se encontro el Articulo");
	$("#cajabusquedaA").val("");
	return false;
}


obtenerConfig();

/////ajax para mostrar datos generales
$.ajax({
	    data: {"clave": clave},
	    type: "post",
	    cache: false,
	    url: "findArticulo",
	})
	 .done(function(data) {
	 	var existencia= data[0].existencia;
 	if(existencia > 0){
 	 //Calcular Enganche
	 var precio = data[0].precio * (1 +(tasaFinanciamiento * plazoMaximo)/100);
	 enganche = (enganche/100) * precio;
	 //Calcular Bonificacion
	 var bonificacion = enganche * (tasaFinanciamiento * plazoMaximo)/100;
	 //Calcular Total
	 var total = precio - enganche - bonificacion;

	 //Inserta los datos calculados
	 $("#enganche").text(enganche.toFixed(2));
	 $("#bonificacion").text(bonificacion.toFixed(2));
	 $("#total").text(total.toFixed(2));

	 $("#articulosEncontrados").append("<tr id="+data[0].id+"><td>"+data[0].descripcion+"</td>"+
	 	"<td>"+data[0].modelo+"</td> <td><input type='number' class='cantidadA'"+
	 	 " style='width:30px; text-align:center;' min='1' max='"+existencia+"' value='1'/></td>"+
	 	  "<td>"+(precio.toFixed(2))+"</td> <td>"+(precio.toFixed(2))+"</td>"+
	 	   "<td><button class='deleteArticulo'>eliminar</button></td></tr>" );
	 	
	 	$("#cajabusquedaA").val("");
	 }
	else{
	 	alert("El artículo seleccionado no cuenta con existencia, favor de verificar.")
	 }

	})
	 .fail(function(data) {
	    
	});


});

////////FUNCION QUE OBTIENE EL PRECIO BASE///////////////////
function getPrecio(clave,cantidad,$this){
	$.ajax({
		data:{"clave": clave},
	    type: "post",
	    cache: false,
	    url: "checkExistencia",
	})
	 .done(function(data) {
	 if(cantidad > data[0].existencia){

	 	alert("El artículo seleccionado no cuenta con existencia, favor de verificar.");
	 	$this.val(1);
	  //Calcular Enganche
	 var precio = data[0].precio * (1 +(tasaFinanciamiento * plazoMaximo)/100);
	 var nuevoEnganche = (parseFloat(configEnganche/100)) * precio;
	 //Calcular Bonificacion
	 var bonificacion = nuevoEnganche * (tasaFinanciamiento * plazoMaximo)/100;
	 //Calcular Total
	 var total = precio - nuevoEnganche - bonificacion;

	
	 //Inserta los datos calculados
	 $("#enganche").text(nuevoEnganche.toFixed(2));
	 $("#bonificacion").text(bonificacion.toFixed(2));
	 $("#total").text(total.toFixed(2));
	 }
	 else{

	
	 //Calcular Enganche
	 var precio = (data[0].precio * cantidad) * (1 +(configTasaFinanciamiento * configPlazoMaximo)/100);
	 var nuevoEnganche = (configEnganche/100) * precio;

	 //Calcular Bonificacion
	 var bonificacion = nuevoEnganche * (configTasaFinanciamiento * configPlazoMaximo)/100;
	 //Calcular Total
	 var total = precio - nuevoEnganche - bonificacion;

	 //Inserta los datos calculados
	 $("#enganche").text(nuevoEnganche.toFixed(2));
	 $("#bonificacion").text(bonificacion.toFixed(2));
	 $("#total").text(total.toFixed(2));
	 }
	 })
	 .fail(function(data) {
	    
	});
}


$("body").on("keyup",".cantidadA",function(e){
var $this=$(this);
	//variables de articulo
	var $this = $(this);
	var clave = $(this).parent().parent().attr("id");
	var cantidad = $(this).val();
if(e.keyCode == 8){
		return false;
	}
if($(this).val() < 1){
		alert("La cantidad debe ser mayor a 0");
		$(this).val(1);
		getPrecio(clave,1,$this);
		return false;
	}
else{
		getPrecio(clave,cantidad,$this);
	}
});

////////////////////ELIMINAR ARTICULOS DE LA TABLA DE VENTAS//////////////////////////////
$("body").on("click",".deleteArticulo",function(){
var c=confirm("¿Seguro borrar este articulo?");
if(c == true){
$(this).parent().parent().remove();
$("#enganche").text("0.00");
	 $("#bonificacion").text("0.00");
	 $("#total").text("0.00");
}
});

///////////////////FASE DE ABONOS////////////////////////

$("#siguienteFase").click(function(){
	obtenerConfig();
	var size=$("#articulosEncontrados").find("tr").length;
	if($("#rfcCliente").text() == "" || size == 0){
		alert("Los datos ingresados no son correctos, favor de verificar");
	}
	else{
		$("#mensualidades").css("display","block");
		$("#cancelar").css("display","none");
		$("#siguienteFase").css("display","none");
		$("#cajabusquedaC").prop("disabled",true);
		$("#cajabusquedaA").prop("disabled",true);
		$("#cancelarNuevaVenta").css("display","none");
		$(".cantidadA").prop("disabled",true);
		$(".deleteArticulo").prop("disabled",true);

	}
	var total=$("#total").text();
	//PRECIO DE CONTADO
	var precioContado= total / (1 + ((configTasaFinanciamiento * plazoMaximo)/100));
	//TOTAL A PAGAR
	var total3 = precioContado * (1 + (tasaFinanciamiento * 3) / 100);
	var total6 = precioContado * (1 + (tasaFinanciamiento * 6) / 100);
	var total9 = precioContado * (1 + (tasaFinanciamiento * 9) / 100);
	var total12 = precioContado * (1 + (tasaFinanciamiento * 12) / 100);
	//IMPORTE ABONO
	var importe3 = total3 / 3;
	var importe6 = total6 / 6;
	var importe9 = total9 / 9;
	var importe12 = total12 / 12;
	//IMPORTE AHORRO
	var importeAhorro3  = total - total3;
	var importeAhorro6  = total - total6;
	var importeAhorro9  = total - total9;
	var importeAhorro12 = total - total12;

	//LLENAR CAMPOS
	$("#mensualidades").children(":nth-child(2)").children(":nth-child(2)").text("$"+importe3.toFixed(2));
	$("#mensualidades").children(":nth-child(2)").children(":nth-child(3)").text("TOTAL A PAGAR $ "+total3.toFixed(2));
	$("#mensualidades").children(":nth-child(2)").children(":nth-child(4)").text("SE AHORRA $ "+importeAhorro3.toFixed(2));

	$("#mensualidades").children(":nth-child(3)").children(":nth-child(2)").text("$"+importe6.toFixed(2));
	$("#mensualidades").children(":nth-child(3)").children(":nth-child(3)").text("TOTAL A PAGAR $ "+total6.toFixed(2));
	$("#mensualidades").children(":nth-child(3)").children(":nth-child(4)").text("SE AHORRA $ "+importeAhorro6.toFixed(2));

	$("#mensualidades").children(":nth-child(4)").children(":nth-child(2)").text("$"+importe9.toFixed(2));
	$("#mensualidades").children(":nth-child(4)").children(":nth-child(3)").text("TOTAL A PAGAR $ "+total9.toFixed(2));
	$("#mensualidades").children(":nth-child(4)").children(":nth-child(4)").text("SE AHORRA $ "+importeAhorro9.toFixed(2));

	$("#mensualidades").children(":nth-child(5)").children(":nth-child(2)").text("$"+importe12.toFixed(2));
	$("#mensualidades").children(":nth-child(5)").children(":nth-child(3)").text("TOTAL A PAGAR $ "+total12.toFixed(2));
	$("#mensualidades").children(":nth-child(5)").children(":nth-child(4)").text("SE AHORRA $ "+importeAhorro12.toFixed(2));

});

$("#cancelarMensualidades").click(function(){
		$("#mensualidades").css("display","none");
		$("#cancelar").css("display","block");
		$("#siguienteFase").css("display","block");
		$("#cajabusquedaC").prop("disabled",false);
		$("#cajabusquedaA").prop("disabled",false);
		$(".cantidadA").prop("disabled",false);
		$(".deleteArticulo").prop("disabled",false);
		$("#cancelarNuevaVenta").css("display","block");
});

$("#guardarVenta").click(function(){
	var size = $("#mensualidades").find("ul").length;
	var total = $("#total").text();
	var str = $("#cajabusquedaC").val();
	var array = str.split("-");
	var clave = array[0];
	var claveArticulo = $("#articulosEncontrados").children(":nth-child(1)").attr("id");
	var cantidad = $(".cantidadA").val();
	for(var i=2; i <= (size+1); i++){
		if($("#mensualidades").children(":nth-child("+(i)+")").children(":nth-child(5)").children(":nth-child(1)").is(":checked")){
			$.ajax({
				data: {"total":total, "clave": clave, "cantidad": cantidad,"claveArticulo":claveArticulo },
			    type: "post",
			    cache: false,
			    url: "guardarVenta",
			})
			.done(function(data) {
			 if(data == 1){
			 	alert("Bien Hecho, Tu venta ha sido registrada correctamente");
			 	window.location.href = "ventas";
			 }
			})
	 		.fail(function(data) {
	    
			});
			return false;
		}
	}
	alert("Debe seleccionar un plazo para realizar el pago de su compra.");
});


});