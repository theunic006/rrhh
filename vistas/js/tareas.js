/*=============================================
CARGAR LA TABLA DINÁMICA DE PERSONAL
=============================================*/

$('.tablaPersonal').DataTable( {
    "ajax": "ajax/datatable-personal.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
AGREGANDO PERSONAL A LA TABLA
=============================================*/

$(".tablaPersonal tbody").on("click", "button.agregarPersonal", function(){

	var idPersonal = $(this).attr("idPersonal");

	$(this).removeClass("btn-primary agregarPersonal");
	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idPersonal", idPersonal);
     $.ajax({

     	url:"ajax/personal.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

			var nombre = respuesta["nombre"];
			var cargo = respuesta["cargo"];
			var observacion = respuesta["tiene"];

			var firma = respuesta["imagenfirma"];
			var huella = respuesta["imagenhuella"];
			var dni = respuesta["pdfdni"];
			var cv = respuesta["pdfcv"];

          	/*=============================================
          	EVITAR AGREGAR PRODUTO CUANDO TIENE ALGUNA OBSERVACION
          	=============================================*/

          	if(observacion == 'SI'){

      			swal({
			      title: "EL PERSONAL TIENE OBSERVACIONES",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

			    $("button[idPersonal='"+idPersonal+"']").addClass("btn-primary agregarPersonal");

			    return;

          	}
          	if(firma=='NO' || huella=='NO' || dni=='NO' || cv=='NO'){

				swal({
				title: "EL PERSONAL NO CUMPLE CON LOS REQUISITOS MINIMOS",
				type: "error",
				confirmButtonText: "¡Cerrar!"
			  });

			  $("button[idPersonal='"+idPersonal+"']").addClass("btn-primary agregarPersonal");

			  return;

			}

          	$(".nuevoPersonal").append(

          	'<div class="row" style="padding:5px 15px">'+
			  '<!-- Descripción del producto -->'+
	          '<div class="col-xs-6" style="padding-right:0px">'+
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarPersonal" idPersonal="'+idPersonal+'"><i class="fa fa-times"></i></button></span>'+

	              '<input type="text" class="form-control nuevoNombrePersonal" idPersonal="'+idPersonal+'" name="agregarPersonal" value="'+nombre+'" readonly required>'+
				  

	            '</div>'+
	          '</div>'+
			  '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-6">'+
	            
	             '<input type="text" class="form-control nuevoCargo" name="nuevCargo" value="'+cargo+'" readonly>'+

	          '</div>' +
	        '</div>') 

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS
			/*
	        $(".nuevoPrecioProducto").number(true, 2);
			localStorage.removeItem("quitarProducto");
			*/
			listarPersonales();

      	}

     })

});



/*=============================================
BOTON INGRESAR PERSONAL
=============================================*/
$(".tablas").on("click", ".btnIngresarPersonal", function(){

	console.log('dentro')

	var idTarea = $(this).attr("idTarea");
	var idPlanta = $(this).attr("idPlanta");

	window.location = "index.php?ruta=crear-personal&idTarea="+idTarea+"&idPlanta="+idPlanta;

})

/*=============================================
BOTON INGRESAR PERSONAL A TAREA
=============================================*/
$(".tablas").on("click", ".btnInsertarPersonal", function(){

	var idTarea = $(this).attr("idTarea");
	var idPlanta = $(this).attr("idPlanta");

	window.location = "index.php?ruta=insertar-personal&idTarea="+idTarea+"&idPlanta="+idPlanta;

	localStorage.setItem("ididtarea", idTarea);
	localStorage.setItem("ididplanta", idPlanta);

})

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaPersonal").on("draw.dt", function(){

	if(localStorage.getItem("quitarProducto") != null){

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

		}


	}


})


/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarPersonal");

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];
	
	}else{

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({"idProducto":idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

	}

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

var numProducto = 0;

$(".btnAgregarPersonal").click(function(){

	numProducto ++;

	var datos = new FormData();
	datos.append("traerPersonales", "ok");

	$.ajax({

		url:"ajax/personal.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
			$(".nuevoPersonal").append(

				'<div class="row" style="padding:5px 15px">'+
				'<!-- Descripción del producto -->'+
				'<div class="col-xs-6" style="padding-right:0px">'+
				  '<div class="input-group">'+
					
					'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarPersonal" idPersonal="'+idPersonal+'"><i class="fa fa-times"></i></button></span>'+
  
					'<input type="text" class="form-control nuevoNombrePersonal" idPersonal="'+idPersonal+'" name="agregarPersonal" value="'+nombre+'" readonly required>'+
					
  
				  '</div>'+
				'</div>'+
				'<!-- Cantidad del producto -->'+
  
				'<div class="col-xs-6">'+
				  
				   '<input type="text" class="form-control nuevoCargo" name="nuevCargo" value="'+cargo+'" readonly>'+
  
				'</div>' +
			  '</div>') 


	        // AGREGAR LOS PRODUCTOS AL SELECT 

	         respuesta.forEach(funcionForEach);

	         function funcionForEach(item, index){

	         	if(item.stock != 0){

		         	$("#producto"+numProducto).append(

						'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
		         	)

		         
		         }	         

	         }

        	 // SUMAR TOTAL DE PRECIOS

    		sumarTotalPrecios()

    		// AGREGAR IMPUESTO
	        
	        agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 2);


      	}

	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioPersonal").on("change", "select.nuevoNombrePersonal", function(){

	console.log('dentro de un formulario')

	var nombrePersonal = $(this).val();

	var nuevoNombrePersonal = $(this).parent().parent().parent().children().children().children(".nuevoNombrePersonal");

	var datos = new FormData();
    datos.append("nombrePersonal", nombrePersonal);


	  $.ajax({

     	url:"ajax/personal.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

			console.log(respuesta);
      	    
      	     $(nuevoNombrePersonal).attr("idProducto", respuesta["id"]);


  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

      	}

      })
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var precioFinal = $(this).val() * precio.attr("precioReal");
	
	precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	if(Number($(this).val()) > Number($(this).attr("stock"))){

		/*=============================================
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
		=============================================*/

		$(this).val(0);

		$(this).attr("nuevoStock", $(this).attr("stock"));

		var precioFinal = $(this).val() * precio.attr("precioReal");

		precio.val(precioFinal);

		sumarTotalPrecios();

		swal({
	      title: "La cantidad supera el Stock",
	      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	    return;

	}

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

})

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPrecios(){

	var precioItem = $(".nuevoPrecioProducto");
	
	var arraySumaPrecio = [];  

	for(var i = 0; i < precioItem.length; i++){

		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		
		 
	}

	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);


}

/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

function agregarImpuesto(){

	var impuesto = $("#nuevoImpuestoVenta").val();
	var precioTotal = $("#nuevoTotalVenta").attr("total");

	var precioImpuesto = Number(precioTotal * impuesto/100);

	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
	
	$("#nuevoTotalVenta").val(totalConImpuesto);

	$("#totalVenta").val(totalConImpuesto);

	$("#nuevoPrecioImpuesto").val(precioImpuesto);

	$("#nuevoPrecioNeto").val(precioTotal);

}

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

$("#nuevoImpuestoVenta").change(function(){

	agregarImpuesto();

});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalVenta").number(true, 2);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$("#nuevoMetodoPago").change(function(){

	var metodo = $(this).val();

	if(metodo == "Efectivo"){

		$(this).parent().parent().removeClass("col-xs-6");

		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			 '<div class="col-xs-4">'+ 

			 	'<div class="input-group">'+ 

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="000000" required>'+

			 	'</div>'+

			 '</div>'+

			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+

			 	'<div class="input-group">'+

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

			 	'</div>'+

			 '</div>'

		 )

		// Agregar formato al precio

		$('#nuevoValorEfectivo').number( true, 2);
      	$('#nuevoCambioEfectivo').number( true, 2);


      	// Listar método en la entrada
      	listarMetodos()

	}else{

		$(this).parent().parent().removeClass('col-xs-4');

		$(this).parent().parent().addClass('col-xs-6');

		 $(this).parent().parent().parent().children('.cajasMetodoPago').html(

		 	'<div class="col-xs-6" style="padding-left:0px">'+
                        
                '<div class="input-group">'+
                     
                  '<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
                       
                  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
                  
                '</div>'+

              '</div>')

	}

	

})

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

	var efectivo = $(this).val();

	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	nuevoCambioEfectivo.val(cambio);

})

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

	// Listar método en la entrada
     listarMetodos()


})


/*=============================================
LISTAR TODOS EL PERSONAL CALIFICADO
=============================================*/

function listarPersonales(){

	var listaPersonales = [];

	var nombre = $(".nuevoNombrePersonal");
	var cargo = $(".nuevoCargo");


	for(var i = 0; i < nombre.length; i++){

		console.log(nombre);

		listaPersonales.push({ "id" : $(nombre[i]).attr("idPersonal"), 
							  "nombre" : $(nombre[i]).val(),
							  "cargo" : $(cargo[i]).val()})
	}

	$("#listaPersonales").val(JSON.stringify(listaPersonales)); 

}

/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

function listarMetodos(){

	var listaMetodos = "";

	if($("#nuevoMetodoPago").val() == "Efectivo"){

		$("#listaMetodoPago").val("Efectivo");

	}else{

		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

	}

}



/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

function quitarAgregarProducto(){

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductos = $(".quitarProducto");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaPersonal tbody button.agregarProducto");

	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for(var i = 0; i < idProductos.length; i++){

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idProductos[i]).attr("idProducto");
		
		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for(var j = 0; j < botonesTabla.length; j ++){

			if($(botonesTabla[j]).attr("idProducto") == boton){

				$(botonesTabla[j]).removeClass("btn-primary agregarProducto");
				$(botonesTabla[j]).addClass("btn-default");

			}
		}

	}
	
}

/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

$('.tablaPersonal').on( 'draw.dt', function(){

	quitarAgregarProducto();

})


/*=============================================
BORRAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEliminarVenta", function(){

  var idVenta = $(this).attr("idVenta");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirPdfRegistro", function(){
	var idTarea = $(this).attr("idTarea");
	window.open("reporte/listaPersonal.php?codigo="+idTarea, "_blank");
})

/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn span").html();
   
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();
		
		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		// if(mes < 10){

		// 	var fechaInicial = año+"-0"+mes+"-"+dia;
		// 	var fechaFinal = año+"-0"+mes+"-"+dia;

		// }else if(dia < 10){

		// 	var fechaInicial = año+"-"+mes+"-0"+dia;
		// 	var fechaFinal = año+"-"+mes+"-0"+dia;

		// }else if(mes < 10 && dia < 10){

		// 	var fechaInicial = año+"-0"+mes+"-0"+dia;
		// 	var fechaFinal = año+"-0"+mes+"-0"+dia;

		// }else{

		// 	var fechaInicial = año+"-"+mes+"-"+dia;
	 //    	var fechaFinal = año+"-"+mes+"-"+dia;

		// }

		dia = ("0"+dia).slice(-2);
		mes = ("0"+mes).slice(-2);

		var fechaInicial = año+"-"+mes+"-"+dia;
		var fechaFinal = año+"-"+mes+"-"+dia;	

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})

/*=============================================
ABRIR ARCHIVO XML EN NUEVA PESTAÑA
=============================================*/

$(".abrirXML").click(function(){

	var archivo = $(this).attr("archivo");
	window.open(archivo, "_blank");


})

/*=============================================================================================================

==============================================================================================================*/


/*=============================================
CARGAR LA TABLA DINÁMICA DE PERSONAL
=============================================*/

$('.tablaPersonalT').DataTable( {
    "ajax": "ajax/datatable-tarea.ajax.php?id="+localStorage.getItem("ididtarea"),
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
AGREGANDO PERSONAL A LA TABLA
=============================================*/

$(".tablaPersonalT tbody").on("click", "button.procesarPdf", function(){
	var idPersonal = $(this).attr("idPersonal");
	window.open("reporte/merge_pdf/processor.php?codigo="+idPersonal, "_blank");

});

/*=============================================
AGREGANDO PERSONAL A LA TABLA
=============================================*/

$(".tablaPersonalT tbody").on("click", "button.verPdf", function(){
	var idPersonal = $(this).attr("idPersonal");
	var idTarea = $(this).attr("idTarea");
	var idPlanta = $(this).attr("idPlanta");
	var idDni = $(this).attr("idDni");

	console.log(idDni);
	console.log(idTarea);
	console.log(idPlanta);
	
	window.open("reporte/plantas/"+idPlanta+"/tareas/"+idTarea+"/"+idPersonal+"/"+idDni+".pdf", "_blank");

});



/*=============================================
AGREGANDO 01 ANEXO ABC
=============================================*/

$(".tablaPersonalT tbody").on("click", "button.anexoABC", function(){
	var idPersonal = $(this).attr("idPersonal");
	var idPlanta = $(this).attr("idPlanta");

	switch (idPlanta) {
		case '1':

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/autorizacion-alpamarca.php?codigo="+idPersonal, "_blank"); }, 0);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoV-alpamarca.php?codigo="+idPersonal, "_blank"); }, 3000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoB.php?codigo="+idPersonal, "_blank"); }, 6000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoC-alpamarca.php?codigo="+idPersonal, "_blank"); }, 9000);

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo4.php?codigo="+idPersonal, "_blank"); }, 12000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo5.php?codigo="+idPersonal, "_blank"); }, 15000);

		break;
		case '2':

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/autorizacion.php?codigo="+idPersonal, "_blank"); }, 0);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/carta.php?codigo="+idPersonal, "_blank"); }, 3000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/declaracion.php?codigo="+idPersonal, "_blank"); }, 6000);
	//	setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoC-alpamarca.php?codigo="+idPersonal, "_blank"); }, 9000);

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo4.php?codigo="+idPersonal, "_blank"); }, 12000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo5.php?codigo="+idPersonal, "_blank"); }, 15000);

		break;
		case '3':

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/autorizacion-alpamarca.php?codigo="+idPersonal, "_blank"); }, 0);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoV-alpamarca.php?codigo="+idPersonal, "_blank"); }, 3000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoB.php?codigo="+idPersonal, "_blank"); }, 6000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoC-alpamarca.php?codigo="+idPersonal, "_blank"); }, 9000);

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo4.php?codigo="+idPersonal, "_blank"); }, 12000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo5.php?codigo="+idPersonal, "_blank"); }, 15000);

		break;
		case '14':

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/autorizacion-cerro.php?codigo="+idPersonal, "_blank"); }, 0);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoA.php?codigo="+idPersonal, "_blank"); }, 3000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoB.php?codigo="+idPersonal, "_blank"); }, 6000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoC.php?codigo="+idPersonal, "_blank"); }, 9000);

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo4.php?codigo="+idPersonal, "_blank"); }, 12000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo5.php?codigo="+idPersonal, "_blank"); }, 15000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/contrato.php?codigo="+idPersonal, "_blank"); }, 18000);

			break;
		case '34':

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/autorizacion-alpamarca.php?codigo="+idPersonal, "_blank"); }, 0);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoV-alpamarca.php?codigo="+idPersonal, "_blank"); }, 3000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoB.php?codigo="+idPersonal, "_blank"); }, 6000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexoC-alpamarca.php?codigo="+idPersonal, "_blank"); }, 9000);

		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo4.php?codigo="+idPersonal, "_blank"); }, 12000);
		setTimeout(() => { window.open("reporte/plantas/"+idPlanta+"/anexo5.php?codigo="+idPersonal, "_blank"); }, 15000);

		break;
		}

		$("button.anexoABC[idPersonal='"+idPersonal+"']").removeClass('btn-primary');
		$("button.anexoABC[idPersonal='"+idPersonal+"']").addClass('btn-default');

});

/*=============================================
SUBIENDO LA FIRMA DEL RESIDENTE
=============================================*/
$(".firmaResidente").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/

	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".firmaResidente").val("");

			swal({
				title: "Error al subir la imagen",
				text: "¡La imagen debe estar en formato JPG o PNG!",
				type: "error",
				confirmButtonText: "¡Cerrar!"
			});

	}else if(imagen["size"] > 2000000){

		$(".firmaResidente").val("");

			swal({
				title: "Error al subir la imagen",
				text: "¡La imagen no debe pesar más de 2MB!",
				type: "error",
				confirmButtonText: "¡Cerrar!"
			});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);

		})

	}
})
