<?php

require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";

$valor = $_GET["codigo"];

$respuesta = ControladorTareas::ctrMostrarPdfTareas($valor);


$titulo =($respuesta[0]["titulo"]);
$fechainicio =($respuesta[0]["fechainicio"]);
$fechafin = ($respuesta[0]["fechafin"]);
$personal = json_decode($respuesta[0]["personal"], true);
$planta = ($respuesta[0]["planta"]);



// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
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
	include(dirname('__FILE__').'/pdflistaPersonal.php');
	$html = ob_get_clean();

	$dompdf = new Dompdf($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('a4', 'portrait');
	$dompdf->render();
	$dompdf->stream('Lista-Personal.pdf',array('Attachment'=>0));


}

?>