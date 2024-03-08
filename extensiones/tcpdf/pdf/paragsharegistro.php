<?php

require_once "../../../controladores/tareas.controlador.php";
require_once "../../../modelos/tareas.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA PLANTA y LOS PERSONALES

$valor = $this->codigo;

$respuesta = ControladorTareas::ctrMostrarPdfTareas($valor);



$titulo =($respuesta[0]["titulo"]);
$fechainicio =($respuesta[0]["fechainicio"]);
$fechafin = ($respuesta[0]["fechafin"]);
$personal = json_decode($respuesta[0]["personal"], true);
$planta = ($respuesta[0]["planta"]);


//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();


$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/image_demo.jpg"></td>
			<td style="background-color:white; width:140px">
				<div style="font-size:8.5px; text-align:right; line-height:15px;">

					<br>
					NIT: 71.759.963-9
					<br>
					Dirección: Calle 44B 92-11

				</div>
			</td>

			<td style="background-color:white; width:140px">
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 300 786 52 49
					<br>
					ventas@inventorysystem.com

				</div>
			</td>
			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$planta</td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


// ---------------------------------------------------------


// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">#</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Personal</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Cargo.</td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($personal as $key => $item) {
$num=1;
$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:center">$key</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">$item[nombre]</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$item[cargo]</td>
		</tr>

	</table>
EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
			<td style="color:#333; background-color:white; width:340px; text-align:center">hoila1</td>
			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center">hoila1</td>
			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">hoila1</td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">Neto:</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ </td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Impuesto:</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ </td>
		</tr>
		<tr>
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>
			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Total:</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ </td>
		</tr>
	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

//$pdf->Output('factura.pdf', 'D');
$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>