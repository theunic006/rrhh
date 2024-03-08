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
    <title>Anexo 5</title>
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
            top: 15px;
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
			font-family: "ArialB";
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
			top:120px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		#parrafo1{
			font-family: "Arial";
			position:absolute;
			top:245px;
			left: 60px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 21px;
		}	

		#subguion{
			font-family: "Arial";
			position:absolute;
			top:960px;
			left: 100px;
			right: 0px;
			bottom:0px;
			font-size:15px;
			text-align: justify;
		}	

		.circulo{
			list-style-type: decimal;;
		}
		#pagina3firma{
			position:absolute;
			top:900px;
			left:120px;
			right: 0px;
			bottom:0px;
			width:150px;
			height: 100px;
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
			align-items: center; /
		}
		.espaciop{
			line-height:1;
		}
    </style>
</head>
<body>
	<div>
		<div class="delante"><img id="logo" src="<?php echo $logodj;?>"></div>
		<div class="delante estiloletra centro" id="anexo2">ANEXO 5</div>
		<div class="delante estiloletra centro" id="declaracion">PROGRAMA DE CAPACITACIÓN ESPECÍFICA EN EL ÁREA DE TRABAJO</div>
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
				<li>Bienvenida y explicación del propósito de la orientación.</li>
				<li>Reconocimiento guiado a las áreas donde los trabajadores desempeñarán su trabajo.</li>
				<li>Explicación de las estadísticas de seguridad del departamento o sección.</li>
				<li>Incidentes, Incidentes Peligrosos, Accidentes de Trabajo y Enfermedades Ocupacionales del Área. </li>
				<li>Explicación de los peligros y riesgos existentes en el área.</li>
				<li>Capacitación sobre los estándares que corresponden al área, con la evaluación correspondiente.</li>
				<li>Capacitación sobre los PETS que corresponden al área, con la evaluación correspondiente.</li>
				<li>Capacitación teórico-práctico sobre las actividades de alto riesgo que se realizan en el área</li>
				<li>Capacitación en el control de los materiales peligrosos que se utilizan en el área.</li>
				<li>Capacitación sobre los agentes físicos, químicos, biológicos presentes en el área.</li>
				<li>Identificación y prevención ergonómica.</li>
				<li>Código de colores y señalización en el área.</li>
				<li>Uso de Equipo de Protección Personal (EPP) apropiado para el tipo de tarea asignada; con explicación de los estándares de uso</li>
				<li>Uso del teléfono del área de trabajo y otras formas de comunicación con radio portátil o estacionario; quiénes, cómo y cuándo se deben utilizar.</li>
				<li>Capacitación en los protocolos de respuesta a emergencia, establecidos para el área donde se desempeñarán los trabajadores.</li>
				<li>Práctica de ubicación (recorrido en campo) y uso de refugios mineros, equipos de respuesta a emergencias, sistema contra incendio, sistemas de alarma, comunicación, extintores, botiquines, camillas, duchas, lava ojos y otros dispositivos utilizados para casos de respuesta a emergencias</li>
				<li>Cómo reportar incidentes de personas, maquinarias o daños de la propiedad de la empresa.</li>
				<li>Importancia del orden y la limpieza en la zona de trabajo. </li>
				<li>Seguimiento, verificación y evaluación del desempeño del trabajador hasta que sea capaz de realizar la tarea asignada.</li>
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