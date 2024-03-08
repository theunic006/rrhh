<?php

class ControladorPlantas{

	/*=============================================
	CREAR PLANTAS
	=============================================*/

	static public function ctrCrearPlanta(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				$tabla = "planta";

				$datos = array("nombre"=>$_POST["nuevoNombre"],
					           "descripcion"=>$_POST["nuevaDescripcion"]);

				$respuesta = ModeloPlantas::mdlIngresarPlanta($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Planta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "plantas";

									}
								})

					</script>';

				}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡La Planta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "plantas";

							}
						})

			  	</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Planta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "plantas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR PLANTAS
	=============================================*/

	static public function ctrMostrarPlantas($item, $valor){

		$tabla = "planta";

		$respuesta = ModeloPlantas::mdlMostrarPlantasT($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR PLANTAS - TAREAS
	=============================================*/

	static public function ctrMostrarPlantasTareas($idPlanta, $idTarea){

		$respuesta = ModeloPlantas::mdlMostrarPlantasTareas($idPlanta, $idTarea);
		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR PLANTA
	=============================================*/

	static public function ctrMostrarPlantaNombre($idPlanta){

		$respuesta = ModeloPlantas::mdlMostrarPlantaNombre($idPlanta);
		return $respuesta;
	
	}	
	/*=============================================
	EDITAR PLANTA
	=============================================*/

	static public function ctrEditarPlanta(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "planta";

				$datos = array("nombre"=>$_POST["editarNombre"],
								"descripcion"=>$_POST["editarDescripcion"],
							   "id"=>$_POST["idPlanta"]);

				$respuesta = ModeloPlantas::mdlEditarPlanta($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Planta ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "plantas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Planta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "plantas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarPlanta(){

		if(isset($_GET["idCategoria"])){

			$respuesta = ModeloProductos::mdlMostrarProductos("productos", "id_categoria", $_GET["idCategoria"], "ASC");
		
			if(!$respuesta){

				$tabla ="Categorias";
				$datos = $_GET["idCategoria"];

				$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La categoría ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "categorias";

										}
									})

						</script>';
				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "La categoría no se puede eliminar porque tiene productos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';	

			}
		}
		
	}
}
