<?php

require_once "../controladores/plantas.controlador.php";
require_once "../modelos/plantas.modelo.php";

class AjaxPlantas{

	/*=============================================
	EDITAR PLANTA
	=============================================*/	

	public $idPlanta;

	public function ajaxEditarPlanta(){

		$item = "id";
		$valor = $this->idPlanta;

		$respuesta = ControladorPlantas::ctrMostrarPlantas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PLANTA
=============================================*/	
if(isset($_POST["idPlanta"])){

	$planta = new AjaxPlantas();
	$planta -> idPlanta = $_POST["idPlanta"];
	$planta -> ajaxEditarPlanta();
}
