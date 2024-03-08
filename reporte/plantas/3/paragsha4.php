<?php

require_once "../../../controladores/personal.controlador.php";
require_once "../../../modelos/personal.modelo.php";

$valor = $_GET["codigo"];
$item = 'id';

$respuesta = ControladorPersonales::ctrMostrarPdfPersonales($item, $valor);
$nombre =($respuesta["nombre"]);
$areatrabajo =($respuesta["areatrabajo"]);
$unidadproduccion =($respuesta["unidadproduccion"]);
$dni =($respuesta["dni"]);
$direccion =($respuesta["direccion"]);
$cargo = ($respuesta["cargo"]);
$distrito = ($respuesta["distrito"]);
$provincia = ($respuesta["provincia"]);
$departamento = ($respuesta["departamento"]);
$edad = ($respuesta["edad"]);
$genero = ($respuesta["genero"]);
$gruposanguineo = ($respuesta["gruposanguineo"]);
$fechainicio = ($respuesta["fechainicio"]);
$fechafin = ($respuesta["fechafin"]);

$pdistrito = ($respuesta["pdistrito"]);
$pprovincia = ($respuesta["pprovincia"]);

$firma = '../../../'.($respuesta["imagenfirma"]);
$huella = '../../../'.($respuesta["imagenhuella"]);

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
	include(dirname('__FILE__').'/pdfparagsha4.php');
	$html = ob_get_clean();

	$dompdf = new Dompdf($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('a4', 'portrait');
	$dompdf->render();

	// Guardar en servidor
	$output = $dompdf->output();
    file_put_contents($directorio.'/anexo4.pdf', $output);
	
	//abrir en navegador
	$dompdf->stream('Lista-Personal.pdf',array('Attachment'=>0));


}

?>