<?php
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
	include(dirname('__FILE__').'/misDatosPdf.php');
	$html = ob_get_clean();

	$dompdf = new Dompdf($options);

	$dompdf->loadHtml($html);
	$dompdf->setPaper('a4', 'portrait');
	$dompdf->render();
	$dompdf->stream('requerimiento_.pdf',array('Attachment'=>0));


}

?>