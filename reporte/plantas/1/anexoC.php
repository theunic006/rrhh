<?php

require_once "../../../controladores/personal.controlador.php";
require_once "../../../modelos/personal.modelo.php";

$valor = $_GET["codigo"];
$item = 'id';

$respuesta = ControladorPersonales::ctrMostrarPdfPersonales($item, $valor);

$nombre =($respuesta["nombre"]);
$dni =($respuesta["dni"]);
$direccion =($respuesta["direccion"]);
$cargo = ($respuesta["cargo"]);
$distrito = ($respuesta["distrito"]);
$provincia = ($respuesta["provincia"]);
$departamento = ($respuesta["departamento"]);
$edad = ($respuesta["edad"]);
$genero = ($respuesta["genero"]);
$gruposanguineo = ($respuesta["gruposanguineo"]);

$planta = ($respuesta["planta"]);
$descripciontrabajo = ($respuesta["descripciontrabajo"]);
$areatrabajo = ($respuesta["areatrabajo"]);
if($areatrabajo=="SUPERFICIE"){
	$check1 = '<input type="checkbox" checked/>';
	$check2 = '<input type="checkbox" unchecked/>';
}else{
	$check1 = '<input type="checkbox" unchecked/>';
	$check2 = '<input type="checkbox" checked/>';
}




$autoriza = ($respuesta["autoriza"]);
$cargoautoriza = ($respuesta["cargoautoriza"]);
$supervisor = ($respuesta["supervisor"]);
$cargosupervisor = ($respuesta["cargosupervisor"]);
$superintendente = ($respuesta["superintendente"]);
$cargosuperintendente = ($respuesta["cargosuperintendente"]);
$residente = ($respuesta["residente"]);
$cargoresidente = ($respuesta["cargoresidente"]);
$fechacontrato = ($respuesta["fechacontrato"]);
$porciones = explode("-", $fechacontrato);
$año= $porciones[0];
$mesnum= $porciones[1];
$dia=$porciones[2];

switch ($mesnum) {
	case '1': $mes = 'Enero';break;
	case '2': $mes = 'Febrero';break;
	case '3': $mes = 'Marzo';break;
	case '4': $mes = 'Abril';break;
	case '5': $mes = 'Mayo';break;
	case '6': $mes = 'Junio';break;
	case '7': $mes = 'Julio';break;
	case '8': $mes = 'Agosto';break;
	case '9': $mes = 'Septiembre';break;
	case '10': $mes = 'Octubre';break;
	case '11': $mes = 'Noviembre';break;
	case '12': $mes = 'Diciembre';break;
	default: $mes = 'Non'; break;
  }

$residentee = '../../../'.($respuesta["firmaResidente"]);

$firma = '../../../'.($respuesta["imagenfirma"]);
$huella = '../../../'.($respuesta["imagenhuella"]);

$idtarea = ($respuesta["idtarea"]);
$fechainicio = ($respuesta["fechainicio"]);
$fechafin = ($respuesta["fechafin"]);
$dias = ($respuesta["dias"]);
$familiar = ($respuesta["familiar"]);
$parentesco = ($respuesta["parentesco"]);
$fcalular = ($respuesta["fcalular"]);
$directorio = 'tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"];


// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Introducimos HTML de prueba
if(empty($_GET["codigo"]))
{
	echo "No es posible generar la una Guia.";
}else{
	$codigo = $_GET["codigo"];

	$options = new Options();
	$options->set('IsRemoteEnable', true);

	ob_start();
	include(dirname('__FILE__').'/pdfanexoC.php');
	$html = ob_get_clean();

	$dompdf = new Dompdf($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('a4', 'portrait');
	$dompdf->render();


	// Guardar en servidor
	$output = $dompdf->output();
    file_put_contents($directorio.'/anexoC.pdf', $output);
	
	//abrir en navegador
	$dompdf->stream('Lista-Personal.pdf',array('Attachment'=>0));


}

?>