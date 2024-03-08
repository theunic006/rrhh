<?php

require_once "../../../controladores/personal.controlador.php";
require_once "../../../modelos/personal.modelo.php";

$valor = $_GET["codigo"];
$item = 'id';

$respuesta = ControladorPersonales::ctrMostrarPdfPersonales($item, $valor);


$nombre =($respuesta["nombre"]);
$dni =($respuesta["dni"]);
$cargo = ($respuesta["cargo"]);
/*
$personal = json_decode($respuesta[0]["personal"], true);
$planta = ($respuesta[0]["planta"]);
*/


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
	include(dirname('__FILE__').'/pdfparagsha1.php');
	$html = ob_get_clean();

	$dompdf = new Dompdf($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('a4', 'portrait');
	$dompdf->render();

	//abrir en navegador
	$dompdf->stream('Lista-Personal.pdf',array('Attachment'=>0));

	// Guardar en servidor
	$output = $dompdf->output();
    file_put_contents('Brochure.pdf', $output);

}

?>