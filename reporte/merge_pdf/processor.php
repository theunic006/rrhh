<?php

require_once "../../controladores/personal.controlador.php";
require_once "../../modelos/personal.modelo.php";

$valor = $_GET["codigo"];
$item = 'id';

$respuesta = ControladorPersonales::ctrMostrarPdfPersonales($item, $valor);

$dni =($respuesta["dni"]);
$idtarea =($respuesta["idtarea"]);
$idplanta =($respuesta["idplanta"]);

$pdfcv ='../../'.($respuesta["pdfcv"]);
$pdfdni ='../../'.($respuesta["pdfdni"]);
$examenmedico ='../../'.($respuesta["certificado"]);
$induccion ='../../'.($respuesta["induccion"]);
$acta ='../../'.($respuesta["acta"]);

$anexoABC = '../plantas/'.$respuesta["idplanta"].'/tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"].'/anexo1ABC.pdf';
$anexo4 = '../plantas/'.$respuesta["idplanta"].'/tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"].'/anexo4.pdf';
$anexo5 = '../plantas/'.$respuesta["idplanta"].'/tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"].'/anexo5.pdf';
$anexoC = '../plantas/'.$respuesta["idplanta"].'/tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"].'/anexoC.pdf';

$ubiacion = '../plantas/'.$respuesta["idplanta"].'/tareas/'.$respuesta["idtarea"].'/'.$_GET["codigo"];

//ORDEN DE LOS DOCUMENTOS
/* 
1. pdfparagsha1abc.pdf
2. examen_medico.pdf
3. pdfparagsha4.pdf
4. induccion.pdf
5. pdfparagsha5.pdf
6. acta_asistencia.pdf
7. contrato.pdf
8. dni.pdf
9. cv.pdf

*/


$FileHandle = fopen($ubiacion.'/'.$respuesta["dni"].'.pdf', 'w+');

$curl = curl_init();

$instructions = '{
  "parts": [
    {
      "file": "primero"
    },
    {
      "file": "segundo"
    },
    {
      "file": "tercero"
    },
    {
      "file": "cuarto"
    },
    {
      "file": "quinto"
    },
    {
      "file": "sexto"
    },
    {
      "file": "septimo"
    },
    {
      "file": "octavo"
    },
    {
      "file": "noveno"
    }
  ]
}';
///https://pspdfkit.com/
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.pspdfkit.com/build',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_POSTFIELDS => array(
    'instructions' => $instructions,
    'primero' => new CURLFILE($anexoABC),
    'segundo' => new CURLFILE($examenmedico),
    'tercero' => new CURLFILE($anexo4),
    'cuarto' => new CURLFILE($induccion),
    'quinto' => new CURLFILE($anexo5),
    'sexto' => new CURLFILE($acta),
    'septimo' => new CURLFILE($anexoC),
    'octavo' => new CURLFILE($pdfdni),
    'noveno' => new CURLFILE($pdfcv)
  ),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer pdf_live_00NAx9HXWf9Xm2PjhI0I2V5Ovpeevoxai5JLB1TFCzC'
  ),
  CURLOPT_FILE => $FileHandle,
));

$response = curl_exec($curl);

curl_close($curl);

fclose($FileHandle);