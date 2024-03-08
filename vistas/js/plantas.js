/*=============================================
EDITAR PLANTA
=============================================*/
$(".tablas").on("click", ".btnEditarPlanta", function(){

	var idPlanta = $(this).attr("idPlanta");

	var datos = new FormData();
	datos.append("idPlanta", idPlanta);

	$.ajax({
		url: "ajax/plantas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			console.log(respuesta);

     		$("#editarNombre").val(respuesta["nombre"]);
			 $("#editarDescripcion").val(respuesta["descripcion"]);
     		$("#idPlanta").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR PLANTA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	 var idCategoria = $(this).attr("idCategoria");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

	 	}

	 })

})

function banios(){
	window.location = "tareas.php?id=1";
  }

/*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".boton").on("click", ".btnIngresarPlanta", function(){

	console.log('dentro')

	var idPlanta = $(this).attr("idPlanta");

	window.location = "index.php?ruta=tareas&idPlanta="+idPlanta;

})