<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";

class AjaxPersonales{

	/*=============================================
	EDITAR PERSONALES
	=============================================*/	
	public $nombrePersonal;
	public $idPersonal;

		public function ajaxEditarPersonal(){

			if($this->nombrePersonal != ""){

				$item = "nombre";
				$valor = $this->$nombrePersonal;

				$respuesta = ControladorPersonales::ctrMostrarPersonales($item, $valor);

				echo json_encode($respuesta);

			}else{

				$item = "id";
				$valor = $this->idPersonal;

				$respuesta = ControladorPersonales::ctrMostrarPersonales($item, $valor);

				echo json_encode($respuesta);

			}
	}

}

class AjaxFamiliar{

	/*=============================================
	EDITAR FAMILIAR
	=============================================*/	

	public $idFamiliar;

	public function ajaxEditarFamiliar(){

		$item = "idpersonal";
		$valor = $this->idFamiliar;

		$respuesta = ControladorPersonales::ctrMostrarFamiliar($item, $valor);

		echo json_encode($respuesta);


	}

}

class AjaxExamen{

	/*=============================================
	EDITAR EXAMEN MEDICO
	=============================================*/	

	public $idExamen;

	public function ajaxEditarExamen(){

		$item = "idpersonal";
		$valor = $this->idExamen;

		$respuesta = ControladorPersonales::ctrMostrarExamen($item, $valor);

		echo json_encode($respuesta);


	}

}

class AjaxInduccion{

	/*=============================================
	EDITAR INDUCCION 
	=============================================*/	

	public $idInduccion;

	public function ajaxEditarInduccion(){

		$item = "idpersonal";
		$valor = $this->idInduccion;

		$respuesta = ControladorPersonales::ctrMostrarInduccion($item, $valor);

		echo json_encode($respuesta);


	}

}

class AjaxObservacion{

	/*=============================================
	EDITAR OBSERVACION
	=============================================*/	

	public $idObservacion;

	public function ajaxEditarObservacion(){

		$item = "idpersonal";
		$valor = $this->idObservacion;

		$respuesta = ControladorPersonales::ctrMostrarObservacion($item, $valor);

		echo json_encode($respuesta);


	}

}

class AjaxExperiencia{

	/*=============================================
	EDITAR EXPERIENCIA
	=============================================*/	

	public $idExperiencia;

	public function ajaxEditarExperiencia(){

		$item = "idpersonal";
		$valor = $this->idExperiencia;

		$respuesta = ControladorPersonales::ctrMostrarExperiencia($item, $valor);

		echo json_encode($respuesta);


	}

}
/*=============================================
EDITAR PERSONALES
=============================================*/	

if(isset($_POST["idPersonal"])){

	$personal = new AjaxPersonales();
	$personal -> idPersonal = $_POST["idPersonal"];
	$personal -> ajaxEditarPersonal();

}

/*=============================================
EDITAR FAMILIAR
=============================================*/	

if(isset($_POST["idFamiliar"])){

	$familiar = new AjaxFamiliar();
	$familiar -> idFamiliar = $_POST["idFamiliar"];
	$familiar -> ajaxEditarFamiliar();

}

/*=============================================
EDITAR EXAMEN MEDICO
=============================================*/	

if(isset($_POST["idExamen"])){

	$examen = new AjaxExamen();
	$examen -> idExamen = $_POST["idExamen"];
	$examen -> ajaxEditarExamen();

}

/*=============================================
EDITAR INDUCCION
=============================================*/	

if(isset($_POST["idInduccion"])){

	$induccion = new AjaxInduccion();
	$induccion -> idInduccion = $_POST["idInduccion"];
	$induccion -> ajaxEditarInduccion();

}

/*=============================================
EDITAR OBSERVACION
=============================================*/	

if(isset($_POST["idObservacion"])){

	$observacion = new AjaxObservacion();
	$observacion -> idObservacion = $_POST["idObservacion"];
	$observacion -> ajaxEditarObservacion();

}

/*=============================================
TRAER PERSONAL
=============================================*/ 

if(isset($_POST["nombrePersonal"])){

	$traerPersonales = new AjaxPersonales();
	$traerPersonales -> nombrePersonal = $_POST["nombrePersonal"];
	$traerPersonales -> ajaxEditarPersonal();
  
  }
/*=============================================
TRAER EXPERIENCIA
=============================================*/ 

if(isset($_POST["idExperiencia"])){

	$traerExperiencia = new AjaxExperiencia();
	$traerExperiencia -> idExperiencia = $_POST["idExperiencia"];
	$traerExperiencia -> ajaxEditarExperiencia();
  
  }

