<?php

$fecha = date("Y-m-d");

$path = '../../logo-2.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logodj = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = $firma;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$imagenfirma = 'data:image/' . $type . ';base64,' . base64_encode($data);

?>

<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anexo 4</title>
    <style>
        
        @font-face {
            font-family: "Arial";           
            src: url("../../dompdf/vendor/dompdf/dompdf/lib/fonts/Arial-Narrow.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        } 
        @font-face {
            font-family: "ArialB";           
            src: url("../../dompdf/vendor/dompdf/dompdf/lib/fonts/Arial-Narrow-Bold.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;

        } 
		@page {
			margin: 0;
			padding: 0;
		}
		.estiloletra{
			font-family: 'Open Sans';
		}
		body{

		}
		.delante{
			z-index: 99;
		}
		.centro{
			text-align: center;   
		}
		.izquierda{
			text-align: left;   
		}
		.negrita{

		}
		.tamano9{
			font-size:9px;
		}
		.tamano10{
			font-size:10px;
		}
		.tamano11{
			font-size:11px;
		}
		.tamano12{
			font-size:12px;
		}
		.tamano15{
			font-size:15px;
		}
		.tamano17{
			font-size:17px;
		}
        #logo {
            position: absolute;
            top: 25px;
            left: 50px;
            right: 0px;
            bottom: 0px;
            width:140px;
            height: 70px;
        }
		#nombre{
			font-family: "Arial";
			position:absolute;
			top:128px;
			left:75px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:13px;

		}
		#dni{
			font-family: "Arial";
			position:absolute;

			top:128px;
			left:585px;
			right: 0px;
			bottom:0px;
			width:100px;
			font-size:13px;
		}
		#cargo{
			font-family: "Arial";
			position:absolute;
			top:228px;
			left:500px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:13px;
		}
		#autorizacion, #anexo2{
			font-family: "ArialB";
			position:absolute;
			top:50px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#dpersonales{
			font-family: "Arial";
			position:absolute;
			top:90px;
			left:30px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:15px;
		}
		#dtrabajo{
			font-family: "Arial";
			position:absolute;
			top:270px;
			left:58px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:15px;
		}
		#dsecuencia{
			font-family: "Arial";
			position:absolute;
			top:620px;
			left:25px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:15px;
		}
		#daviso{
			font-family: "Arial";
			position:absolute;
			top:950px;
			left:58px;
			right: 0px;
			bottom:0px;
			width:685px;
			font-size:10px;
			text-align: justify;
		}
		.colorplomo{
			background: #7f7f7f;
			color:#FFF;
		}
		td{
			padding-left:4px;
		}


				/*PAGINA 2*/


		#declaracion{
			font-family: "ArialB";
			position:absolute;
			top:80px;
			left:0px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#gerencia{
			font-family: "Arial";
			position:absolute;
			top:100px;
			left:0px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		.tabla1-2{
			border-collapse: collapse;
			font-family: "Arial";
			position:absolute;
			top:125px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
			padding-top:0px;
		}
		#parrafo1{
			font-family: "Arial";
			position:absolute;
			top:250px;
			left: 40px;
			right: 0px;
			bottom:0px;
			width:85%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	

		#subguion{
			font-family: "Arial";
			position:absolute;
			top:920px;
			left: 100px;
			right: 0px;
			bottom:0px;
			font-size:15px;
			text-align: justify;
		}	

		.circulo{
			list-style-type: disc;
		}
		#pagina3firma{
			position:absolute;
			top:850px;
			left:130px;
			right: 0px;
			bottom:0px;
			width:150px;
			height: 100px;
			z-index: 99;
		}
		.estilogrueso{
			font-family:'ArialB';
			display:inline-block;
			vertical-align: text-top;
		}
		.estilogrueso2{
			font-family:'ArialB';
			display:inline-block;
			vertical-align: -3px;
		}
		.estilo{
			font-family:'Arial';
		}
		.lineal{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.espaciop{
			line-height:1.2;
			padding-bottom:-15px;
		}
		ul li{
			list-style-type:none;
		}
    </style>
</head>
<body>
	<div>
		<div class="delante"><img id="logo" src="<?php echo $logodj;?>"></div>
		<div class="delante estiloletra centro" id="anexo2">ANEXO 4</div>
		<div class="delante estiloletra centro" id="declaracion">INDUCCIÓN Y ORIENTACIÓN BÁSICA</div>
		<div class="delante estiloletra centro" id="gerencia">PARA USO DE LA GERENCIA DE SEGURIDAD Y SALUD OCUPACIONAL</div>
		<table class="tabla1-2 estiloletra" border="1">
			<tbody>
				<tr>
				<td class="tamano15"width="334px" >Titular: <div class="estilogrueso2">VOLCAN COMPAÑÍA MINERA S.A.A</div></td>
				<td class="tamano15" width="334px">Trabajador: <div class="estilogrueso2"><?php echo $nombre?></div></td>
				</tr>
				<tr>
				<td class="tamano15">E.C.M./CONEXAS : <div class="estilogrueso2">S.I. DEJOTA S.A.C.</div></td>
				<td class="tamano15">Fecha de Ingreso: <div class="estilogrueso2"><?php echo $fechainicio?></td>
				</tr>
				<tr>
				<td class="tamano15">Unidad de Producción: <div class="estilogrueso2"><?php echo $unidadproduccion?></div></td>
				<td class="tamano15">Registro o N° de Fotocheck: <div class="estilogrueso2"><?php echo $dni?></div></td>
				</tr>
				<tr>
				<td class="tamano15">Distrito: <div class="estilogrueso2"><?php echo $pdistrito?></div></td>
				<td class="tamano15">Ocupación: <div class="estilogrueso2"><?php echo $cargo?></div></td>
				</tr>
				<tr>
				<td class="tamano15">Provincia: <div class="estilogrueso2"><?php echo $pprovincia?></div></td>
				<td class="tamano15">Área de Trabajo: <div class="estilogrueso2"><?php echo $areatrabajo?></div></td>
				</tr>
			</tbody>
			
		</table>
		<div id="parrafo1">
			<ul class="circulo espaciop">
				<li><input type="checkbox" checked>
				  Revisión del Programa de Recorrido de Inducción por Ingreso del Departamento de                           Administración de Personal.
				</li>
				<li><input type="checkbox" checked>   Bienvenida y explicación del propósito de la orientación</li>
				<li><input type="checkbox" checked>   Pasado y presente del desempeño de la unidad de producción en Seguridad y Salud                            Ocupacional.</li>
				<li><input type="checkbox" checked>   Importancia del trabajador en el Programa de Seguridad y Salud Ocupacional.</li>
				<li><input type="checkbox" checked>    Política de Seguridad y Salud Ocupacional.</li>
				<li><input type="checkbox" checked>    Presentación y explicación del Sistema de Gestión de Seguridad y Salud Ocupacional                           implementado en la empresa minera.</li>
				<li><input type="checkbox" checked>    Reglamento Interno de Seguridad y Salud Ocupacional, Reglas de Tránsito y otras normas.</li>
				<li><input type="checkbox" checked>    Comité Paritario de Seguridad y Salud Ocupacional.</li>
				<li><input type="checkbox" checked>    Obligaciones, Derechos y Responsabilidades de los trabajadores y supervisores</li>
				<li><input type="checkbox" checked>    Explicación de Peligros, Riesgos, incidentes, estándares, PETS, ATS, PETAR, IPERC y jerarquía         de controles.</li>
				<li><input type="checkbox" checked>    Trabajos de alto riesgo en la Unidad Minera.</li>
				<li><input type="checkbox" checked>    Higiene ocupacional: Agentes físicos, químicos, biológicos, ergonomía</li>
				<li><input type="checkbox" checked>    Código de colores y señalización.</li>
				<li><input type="checkbox" checked>    Control de sustancias peligrosas</li>
				<li><input type="checkbox" checked>    Primeros Auxilios y Resucitación Cardio Pulmonar (RCP).</li>
				<li><input type="checkbox" checked>    Plan de emergencias en la Unidad minera.</li>
			</ul>
		</div>

		<div><img id="pagina3firma" src="<?php echo $imagenfirma;?>"></div>
		<div class="delante" id="subguion"><p class="p">.....................................................................                                    .......................................................................... </p>
		<p class="p" style="margin-top:-2px; margin-bottom:0px;">                   Firma del Trabajador                                                                 V°B° del Gerente de Seguridad y</p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">                                                                                                             Salud Ocupacional o Ingeniero de Seguridad</p>
		</div>
	</div>
</body>
</html>