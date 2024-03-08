<?php

class ControladorPersonales{

	/*=============================================
	CREAR PERSONALES
	=============================================*/

	static public function ctrCrearPersonal(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
				preg_match('/^[0-9]+$/', $_POST["dni"])){

				/*=============================================
				VALIDAR IMAGEN DE FIRMA
				=============================================*/

				$ruta = "";

					if(isset($_FILES["imagenfirma"]["tmp_name"]) && !empty($_FILES["imagenfirma"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["imagenfirma"]["tmp_name"]);
	
						$nuevoAncho = 500;
						$nuevoAlto = 400;
	
						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/
						$directorio2 = "vistas/img/personales/".$_POST["dni"];
						if($directorio2!=null){
							mkdir($directorio2, 0755);
						}
	
						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/
	
						if($_FILES["imagenfirma"]["type"] == "image/jpeg"){
	
							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$ruta = "vistas/img/personales/".$_POST["dni"]."/firma.jpg";
							$origen = imagecreatefromjpeg($_FILES["imagenfirma"]["tmp_name"]);						
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino, $ruta);
	
						}
	
						if($_FILES["imagenfirma"]["type"] == "image/png"){
	
							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$ruta = "vistas/img/personales/".$_POST["dni"]."/firma.png";
							$origen = imagecreatefrompng($_FILES["imagenfirma"]["tmp_name"]);						
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino, $ruta);
						}

						if($ruta == ""){
							$ruta="VACIO";
						}
	
					}

				

				/*=============================================
				VALIDAR IMAGEN DE HUELLA
				=============================================*/

				$rutahuella = "";

					if(isset($_FILES["imagenhuella"]["tmp_name"]) && !empty($_FILES["imagenhuella"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["imagenhuella"]["tmp_name"]);

						$nuevoAncho = 400;
						$nuevoAlto = 500;

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/
						$directorio2 = "vistas/img/personales/".$_POST["dni"];
						if($directorio2!=null){
							mkdir($directorio2, 0755);
						}

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["imagenhuella"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$rutahuella = "vistas/img/personales/".$_POST["dni"]."/huella.jpg";
							$origen = imagecreatefromjpeg($_FILES["imagenhuella"]["tmp_name"]);						
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino, $rutahuella);

						}

						if($_FILES["imagenhuella"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$rutahuella = "vistas/img/personales/".$_POST["dni"]."/huella.png";
							$origen = imagecreatefrompng($_FILES["imagenhuella"]["tmp_name"]);						
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino, $rutahuella);
						}

						if($rutahuella == ""){
							$rutahuella="VACIO";
						}

					}
				

				/*=============================================
				VALIDAR ARCHIVO PDF DNI
				=============================================*/

				$rutadni = "";

					if(isset($_FILES["pdfdni"]["tmp_name"]) && !empty($_FILES["pdfdni"]["tmp_name"])){

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/
						$directorio3 = "vistas/img/personales/".$_POST["dni"];
						if($directorio3!=null){
							mkdir($directorio3, 0755);
						}

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["pdfdni"]["type"] == "application/pdf"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$rutadni = "vistas/img/personales/".$_POST["dni"]."/dni.pdf";
							$origen = basename($_FILES["pdfdni"]["tmp_name"]);	

							move_uploaded_file($_FILES["pdfdni"]["tmp_name"], $rutadni );
						}

						if($rutadni == ""){
							$rutadni="VACIO";
						}

					}


				/*=============================================
				VALIDAR ARCHIVO PDF CV
				=============================================*/

				$rutacv = "";

					if(isset($_FILES["pdfcv"]["tmp_name"]) && !empty($_FILES["pdfcv"]["tmp_name"])){

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/
						$directorio4 = "vistas/img/personales/".$_POST["dni"];
						if($directorio4!=null){
							mkdir($directorio4, 0755);
						}

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["pdfcv"]["type"] == "application/pdf"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/
							$aleatorio = mt_rand(100,999);
							$rutacv = "vistas/img/personales/".$_POST["dni"]."/cv.pdf";
							$origen = basename($_FILES["pdfcv"]["tmp_name"]);	

							move_uploaded_file($_FILES["pdfcv"]["tmp_name"], $rutacv );

						}

						if($rutacv == ""){
							$rutacv="VACIO";
						}

					}
				

				$tabla = "personal";

				$datos = array("nombre"=>$_POST["nombre"],
								"dni"=>$_POST["dni"],
								"cargo"=>$_POST["cargo"],
								"celular"=>$_POST["celular"],
								"correo"=>$_POST["correo"],
								"nacionalidad"=>$_POST["nacionalidad"],
								"genero"=>$_POST["genero"],
								"estadocivil"=>$_POST["estadocivil"],
								"gruposanguineo"=>$_POST["gruposanguineo"],
								"fechanacimiento"=>$_POST["fechanacimiento"],
								"edad"=>$_POST["edad"],
								"direccion"=>$_POST["direccion"],
								"distrito"=>$_POST["distrito"],
								"provincia"=>$_POST["provincia"],
								"departamento"=>$_POST["departamento"],
								"imagenfirma"=>$ruta,
								"imagenhuella"=>$rutahuella,
								"pdfdni"=>$rutadni,
								"pdfcv"=>$rutacv);

				$respuesta = ModeloPersonales::mdlIngresarPersonal($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
							type: "success",
							title: "El Personal ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
							type: "error",
							title: "¡El Personal no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

				</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PERSONAL
	=============================================*/

	static public function ctrMostrarPersonales($item, $valor){

		$tabla = "personal";

		$respuesta = ModeloPersonales::mdlMostrarPersonales2($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR PERSONAL EN TAREA
	=============================================*/

	static public function ctrMostrarPersonalesT($valor){

		$tabla = "personal";

		$respuesta = ModeloPersonales::mdlMostrarPersonales3($tabla, $valor);

		return $respuesta;

	}
	/*=============================================
	EDITAR PERSONAL
	=============================================*/

	static public function ctrEditarPersonal(){

		if(isset($_POST["editnombre"])){

			if(preg_match('/^[0-9]+$/', $_POST["editdni"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["firmaactual"];

				if(isset($_FILES["editimagenfirma"]["tmp_name"]) && !empty($_FILES["editimagenfirma"]["tmp_name"])){

				 list($ancho, $alto) = getimagesize($_FILES["editimagenfirma"]["tmp_name"]);

				 $nuevoAncho = 500;
				 $nuevoAlto = 400;

				 /*=============================================
				 CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				 =============================================*/

					$directorio = "vistas/img/personales/".$_POST["editdni"];
					if($directorio!=null){
						mkdir($directorio, 0755);
					}

				 /*=============================================
				 PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				 =============================================*/

				 if(!empty($_POST["firmaactual"]) && $_POST["firmaactual"] != "vistas/img/productos/default/anonymous.png"){
					 unlink($_POST["firmaactual"]);
				 }else{
					 mkdir($directorio, 0755);	
				 }
				 
				 /*=============================================
				 DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				 =============================================*/

				 if($_FILES["editimagenfirma"]["type"] == "image/jpeg"){

					 /*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

					 $aleatorio = mt_rand(100,999);
					 $ruta = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."firma.jpg";
					 $origen = imagecreatefromjpeg($_FILES["editimagenfirma"]["tmp_name"]);						
					 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					 imagejpeg($destino, $ruta);

				 }

				 if($_FILES["editimagenfirma"]["type"] == "image/png"){

					 /*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

					 $aleatorio = mt_rand(100,999);
					 $ruta = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."firma.png";
					 
					 $origen = imagecreatefrompng($_FILES["editimagenfirma"]["tmp_name"]);						
					 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					 imagepng($destino, $ruta);

				 }

			 	}

				/*=============================================
				VALIDAR IMAGEN FIRMA
				=============================================*/

				$rutahuella = $_POST["huellaactual"];

				if(isset($_FILES["editimagenhuella"]["tmp_name"]) && !empty($_FILES["editimagenhuella"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editimagenhuella"]["tmp_name"]);

					$nuevoAncho = 400;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio2 = "vistas/img/personales/".$_POST["editdni"];
					if($directorio2!=null){
						mkdir($directorio2, 0755);
					}

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["huellaactual"])){
						unlink($_POST["huellaactual"]);
					}else{
						mkdir($directorio2, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editimagenhuella"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutahuella = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."huella.jpg";
						$origen = imagecreatefromjpeg($_FILES["editimagenhuella"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutahuella);

					}

					if($_FILES["editimagenhuella"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						
						$aleatorio = mt_rand(100,999);
						$rutahuella = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."huella.png";
						$origen = imagecreatefrompng($_FILES["editimagenhuella"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutahuella);

					}

				}

				/*=============================================
				VALIDAR IMAGEN pdf DNI
				=============================================*/

				$rutadni = $_POST["dniactual"];

				if(isset($_FILES["editpdfdni"]["tmp_name"]) && !empty($_FILES["editpdfdni"]["tmp_name"])){

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio3 = "vistas/img/personales/".$_POST["editdni"];
					if($directorio3!=null){
						mkdir($directorio3, 0755);
					}
					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["dniactual"])){
						unlink($_POST["dniactual"]);
					}else{
						mkdir($directorio3, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editpdfdni"]["type"] == "application/pdf"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutadni = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."dni.pdf";
						$origen = basename($_FILES["editpdfdni"]["tmp_name"]);	

						move_uploaded_file($_FILES["editpdfdni"]["tmp_name"], $rutadni );

					}

				}

				/*=============================================
				VALIDAR IMAGEN pdf CV
				=============================================*/

				$rutacv = $_POST["cvactual"];

				if(isset($_FILES["editpdfcv"]["tmp_name"]) && !empty($_FILES["editpdfcv"]["tmp_name"])){

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio4 = "vistas/img/personales/".$_POST["editdni"];
					if($directorio4!=null){
						mkdir($directorio4, 0755);
					}

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["cvactual"])){
						unlink($_POST["cvactual"]);
					}else{
						mkdir($directorio4, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editpdfcv"]["type"] == "application/pdf"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutacv = "vistas/img/personales/".$_POST["editdni"]."/".$aleatorio."cv.pdf";
						$origen = basename($_FILES["editpdfcv"]["tmp_name"]);	

						move_uploaded_file($_FILES["editpdfcv"]["tmp_name"], $rutacv );

					}

				}	


			   	$tabla = "personal";

			   	$datos = array("id"=>$_POST["idPersonal"],
			   				   "nombre"=>$_POST["editnombre"],
								"dni"=>$_POST["editdni"],
								"cargo"=>$_POST["editcargo"],
								"celular"=>$_POST["editcelular"],
								"correo"=>$_POST["editcorreo"],
								"nacionalidad"=>$_POST["editnacionalidad"],
								"genero"=>$_POST["editgenero"],
								"estadocivil"=>$_POST["editestadocivil"],
								"gruposanguineo"=>$_POST["editgruposanguineo"],
								"fechanacimiento"=>$_POST["editfechanacimiento"],
								"edad"=>$_POST["editedad"],
								"direccion"=>$_POST["editdireccion"],
								"distrito"=>$_POST["editdistrito"],
								"provincia"=>$_POST["editprovincia"],
								"departamento"=>$_POST["editdepartamento"],
								"imagenfirma"=>$ruta,
								"imagenhuella"=>$rutahuella,
								"pdfdni"=>$rutadni,
								"pdfcv"=>$rutacv);
					           

			   	$respuesta = ModeloPersonales::mdlEditarPersonal($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El personal ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El personal no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR PERSONAL
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	MOSTRAR FAMILIAR
	=============================================*/

	static public function ctrMostrarFamiliar($item, $valor){

		$tabla = "familiar";

		$respuesta = ModeloPersonales::mdlMostrarFamiliar($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	EDITAR EXAMEN FAMILIAR
	=============================================*/

	static public function ctrEditarFamiliar(){

		if(isset($_POST["nombreFam"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreFam"]) &&
			   preg_match('/^[0-9]+$/', $_POST["idFamPersonal"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoactual"];

				if(isset($_FILES["fotoFam"]["tmp_name"]) && !empty($_FILES["fotoFam"]["tmp_name"])){

				 list($ancho, $alto) = getimagesize($_FILES["fotoFam"]["tmp_name"]);

				 $nuevoAncho = 800;
				 $nuevoAlto = 1000;

				 /*=============================================
				 CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				 =============================================*/

				 $directorio = "vistas/img/personales/".$_POST["idFamPersonal"];

				 /*=============================================
				 PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				 =============================================*/

				 if(!empty($_POST["fotoactual"]) && $_POST["fotoactual"] != "vistas/img/productos/default/anonymous.png"){
					 unlink($_POST["fotoactual"]);
				 }else{
					 mkdir($directorio, 0755);	
				 }
				 
				 /*=============================================
				 DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				 =============================================*/

				 if($_FILES["fotoFam"]["type"] == "image/jpeg"){

					 /*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

					 $aleatorio = mt_rand(100,999);
					 $ruta = "vistas/img/personales/".$_POST["idFamPersonal"]."/".$aleatorio."fotofamiliar.jpg";
					 $origen = imagecreatefromjpeg($_FILES["fotoFam"]["tmp_name"]);						
					 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					 imagejpeg($destino, $ruta);

				 }

				 if($_FILES["fotoFam"]["type"] == "image/png"){

					 /*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

					 $aleatorio = mt_rand(100,999);
					 $ruta = "vistas/img/personales/".$_POST["idFamPersonal"]."/".$aleatorio."fotofamiliar.png";
					 
					 $origen = imagecreatefrompng($_FILES["fotoFam"]["tmp_name"]);						
					 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					 imagepng($destino, $ruta);

				 }
				 if ($ruta == "") {
					$ruta= "vistas/img/usuarios/default/anonymous.png";
				 }

			 }

			   	$tabla = "familiar";

			   	$datos = array("id"=>$_POST["idFamiliar"],
			   				   "nombre"=>$_POST["nombreFam"],
								"parentesco"=>$_POST["parentescoFam"],
								"celular"=>$_POST["celularFam"],
								"fotografia"=>$ruta,
								"planilla"=>$_POST["planillaFam"]);
					           

			   	$respuesta = ModeloPersonales::mdlEditarFamiliar($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Familiar del Personal fue Registrado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Familiar del personal no fur registrado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}

	}
	/*=============================================
	MOSTRAR EXAMEN MEDICO
	=============================================*/

	static public function ctrMostrarExamen($item, $valor){

		$tabla = "examenmedico";

		$respuesta = ModeloPersonales::mdlMostrarExamen($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	EDITAR EXAMEN MEDICO
	=============================================*/

	static public function ctrEditarExamen(){

		if(isset($_POST["clinicaExam"])){

			if(preg_match('/^[0-9]+$/', $_POST["idExamPersonal"])){

				/*=============================================
				VALIDAR PDF DE EXAMEN MEDICO
				=============================================*/

				$rutacertificado = $_POST["certificadoactual"];

				if(isset($_FILES["editpdfcertificado"]["tmp_name"]) && !empty($_FILES["editpdfcertificado"]["tmp_name"])){

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio3 = "vistas/img/personales/".$_POST["idExamPersonal"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["certificadoactual"])){
						unlink($_POST["certificadoactual"]);
					}else{
						mkdir($directorio3, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editpdfcertificado"]["type"] == "application/pdf"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutacertificado = "vistas/img/personales/".$_POST["idExamPersonal"]."/".$aleatorio."certificado_medico.pdf";
						$origen = basename($_FILES["editpdfcertificado"]["tmp_name"]);	

						move_uploaded_file($_FILES["editpdfcertificado"]["tmp_name"], $rutacertificado );

					}

				}



			   	$tabla = "examenmedico";

			   	$datos = array("id"=>$_POST["idExamen"],
			   				   "fechainicio"=>$_POST["fechainicioExam"],
								"fechafin"=>$_POST["fechafinExam"],
								"cantidaddias"=>$_POST["cantidaddiasExam"],
								"estado"=>$_POST["estadoExam"],
								"clinica"=>$_POST["clinicaExam"],
								"vacuna"=>$_POST["vacunaExam"],
								"certificado"=>$rutacertificado);
					           

			   	$respuesta = ModeloPersonales::mdlEditarExamen($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Familiar del Personal fue Registrado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Familiar del personal no fur registrado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR INDUCCION
	=============================================*/

	static public function ctrMostrarInduccion($item, $valor){

		$tabla = "induccion";

		$respuesta = ModeloPersonales::mdlMostrarInduccion($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR EXAMEN 	INDUCCION
	=============================================*/

	static public function ctrEditarInduccion(){

		if(isset($_POST["idInduccion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idInduccion"])){

				/*=============================================
				VALIDAR PDF DE EXAMEN INDUCCION
				=============================================*/

				$rutacertificado = $_POST["induccionactual"];

				if(isset($_FILES["editpdfinduccion"]["tmp_name"]) && !empty($_FILES["editpdfinduccion"]["tmp_name"])){

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio3 = "vistas/img/personales/".$_POST["idIndPersonal"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["induccionactual"])){
						unlink($_POST["induccionactual"]);
					}else{
						mkdir($directorio3, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editpdfinduccion"]["type"] == "application/pdf"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutacertificado = "vistas/img/personales/".$_POST["idIndPersonal"]."/".$aleatorio."certificado_induccion.pdf";
						$origen = basename($_FILES["editpdfinduccion"]["tmp_name"]);	

						move_uploaded_file($_FILES["editpdfinduccion"]["tmp_name"], $rutacertificado );

					}

				}

				$rutaacta = $_POST["actaactual"];

				if(isset($_FILES["editpdfacta"]["tmp_name"]) && !empty($_FILES["editpdfacta"]["tmp_name"])){

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio3 = "vistas/img/personales/".$_POST["idIndPersonal"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["actaactual"])){
						unlink($_POST["actaactual"]);
					}else{
						mkdir($directorio3, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editpdfacta"]["type"] == "application/pdf"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$rutaacta = "vistas/img/personales/".$_POST["idIndPersonal"]."/".$aleatorio."acta_induccion.pdf";
						$origen = basename($_FILES["editpdfacta"]["tmp_name"]);	

						move_uploaded_file($_FILES["editpdfacta"]["tmp_name"], $rutaacta );

					}

				}

			   	$tabla = "induccion";

			   	$datos = array("id"=>$_POST["idInduccion"],
			   				   "fechainicio"=>$_POST["fechainicioInd"],
								"fechafin"=>$_POST["fechafinInd"],
								"estado"=>$_POST["estadoInd"],
								"causa"=>$_POST["causaInd"],
								"induccion"=>$rutacertificado,
								"acta"=>$rutaacta);
					           

			   	$respuesta = ModeloPersonales::mdlEditarInduccion($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Familiar del Personal fue Registrado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Familiar del personal no fur registrado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR OBSERVACION
	=============================================*/

	static public function ctrMostrarObservacion($item, $valor){

		$tabla = "observacion";

		$respuesta = ModeloPersonales::mdlMostrarObservacion($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR OBSERVACION
	=============================================*/

	static public function ctrEditarObservacion(){

		if(isset($_POST["tieneObs"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tieneObs"])){

			   	$tabla = "observacion";

			   	$datos = array("id"=>$_POST["idObservacion"],
			   				   "tipo"=>$_POST["tipoObs"],
								"observacion"=>$_POST["observacionObs"],
								"detalle"=>$_POST["detalleObs"],
								"tiene"=>$_POST["tieneObs"],
								"fecha_termina"=>$_POST["fechaterminaObs"]);
					           

			   	$respuesta = ModeloPersonales::mdlEditarObservacion($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Se cambio la Observacion del Personal",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "personal";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡No se cambio la Observacion del Personal!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personal";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PERSONAL CALIFICADO PARA PDF 
	=============================================*/

	static public function ctrMostrarPdfPersonales($item, $valor){

		$tabla = "personal";
		$respuesta = ModeloPersonales::mdlMostrarPdfPersonales($tabla, $item, $valor);
		return $respuesta;

	}

	/*=============================================
	MOSTRAR EXPERIENCIA
	=============================================*/

	static public function ctrMostrarExperiencia($item, $valor){

		$tabla = "experiencia";

		$respuesta = ModeloPersonales::mdlMostrarExperiencia($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	AGREGAR EXPERIENCIA
	=============================================*/

	static public function ctrEditarExperiencia(){

		if(isset($_POST["idnose"])){

			if(isset($_POST["idnose"])){


			   	$tabla = "experiencia";

			   	$datos = array( "tipo"=>$_POST["exptipo"],
								"empresa"=>$_POST["expempresa"],
								"cargo"=>$_POST["expcargo"],
								"sector"=>$_POST["exparea"],
								"fechainicio"=>$_POST["expfechainicio"],
								"fechafin"=>$_POST["expfechafin"],
								"anio"=>$_POST["expanio"],
								"mes"=>$_POST["expmes"],
								"dia"=>$_POST["expdia"],
								"observaciones"=>$_POST["expobservaciones"],
								"idpersonal"=>$_POST["idnose"]);
					           

			   	$respuesta = ModeloPersonales::mdlEditarExperiencia($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La experiencia fue guardado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La experiencia no se guardo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "";

							}
						})

			  	</script>';



			}

		}

	}
}

