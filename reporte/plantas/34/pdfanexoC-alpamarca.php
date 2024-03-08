<?php

$fecha = date("Y-m-d");

$path = '../../logo.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logodj = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = $firma;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$imagenfirma = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = $huella;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$imagenhuella = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = $residentee;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$firmaResidente = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = '../../firmajosue.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$firmajosue = 'data:image/' . $type . ';base64,' . base64_encode($data);

?>

<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anexo C</title>
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

		body{
			font-family:'Arial';
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
		#logo{
			position:absolute;
			top:10px;
			left:50px;
			right: 0px;
			bottom:0px;
			width:150px;
			height: 80px;
		}
		#nombre{
			font-family: "ArialB";

			position:absolute;
			top:128px;
			left:75px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:13px;

		}
		#dni{
			font-family: "arial", "Courier New", "ArialB";
			position:absolute;
			top:128px;
			left:585px;
			right: 0px;
			bottom:0px;
			width:100px;
			font-size:13px;
		}
		#cargo{
			font-family: "arial", "Courier New", "ArialB";
			position:absolute;
			top:228px;
			left:500px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:13px;
		}
		#autorizacion{
			font-family: "ArialB";
			position:absolute;
			top:50px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#anexo2{
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
			left:10px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:12px;
		}
		#dtrabajo{
			font-family: "ArialB";
			position:absolute;
			top:263px;
			left:28px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:12px;
		}
		#dsecuencia{
			font-family:"ArialB";
			position:absolute;
			top:610px;
			left:-42px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:11px;
		}
		#daviso{
			font-family: "Arial";
			position:absolute;
			top:940px;
			left:58px;
			right: 0px;
			bottom:0px;
			width:685px;
			font-size:10px;
			text-align: justify;
		}
		.colorplomo{
			background: #7f7f7f;
			font-family:"ArialB";
			color:#FFF;
			padding-top:0px;
			padding-bottom:0px;
		}
		td{
			padding:4px;
			font-size:11px;
		}
		.tabla1{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:105px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla2{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:195px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla3{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:278px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla3-1{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:400px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}

		.tabla4{
			border-collapse: collapse;
			font-family:"Arial";
			position:absolute;
			top:500px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla5{
			border-collapse: collapse;
			font-family:"Arial";
			position:absolute;
			top:627px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		#posicion{
			position:relative;
			top:-22px;
			font-size:10px;
		}
		.tabla6{
			border-collapse: collapse;
			font-family:"Arial";
			position:absolute;
			top:688px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla7{
			border-collapse: collapse;
			font-family:"Arial";
			position:absolute;
			top:753px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla8{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:813px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla9{
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:874px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tablafin{
			border-top: 1px solid black;
			font-family: "arial", "Courier New", "Arial";
			position:absolute;
			top:990px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:10px;
		}

				/*PAGINA 2*/


		#declaracion{
			font-family:"ArialB";
			position:absolute;
			top:80px;
			left:0px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#parrafo1{
			font-family:"Arial";
			position:absolute;
			top:110px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#parrafo2{
			font-family:"Arial";
			position:absolute;
			top:420px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#subguion{
			font-family:"Arial";
			position:absolute;
			top:840px;
			left: 270px;
			right: 0px;
			bottom:0px;
			width:350px;
			font-size:17px;
			text-align: center;
		}	

			/*PAGINA 3*/
		#parrafo2-2{
			font-family:"Arial";
			position:absolute;
			top:300px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#subguion-2{
			font-family:"Arial";
			position:absolute;
			top:670px;
			left: 170px;
			right: 0px;
			bottom:0px;
			width:500px;
			font-size:17px;
			text-align: center;
		}	
		.cuadrado {
			position:absolute;
			top:900px;
			left: 530px;
			right: 0px;
			bottom:0px;
			width: 120px;           /* Ancho de 150 píxeles */
			height: 150px;          /* Alto de 150 píxeles */     /* Fondo de color rojo */
			border: 1px solid #000; /* Borde color negro y de 1 píxel de grosor */
		}

			/*PAGINA 3*/

		#declaracion1-3{
			font-family: "ArialB";
			position:absolute;
			top:80px;
			left:96px;
			right: 0px;
			bottom:0px;
			width:75%;
			font-size:17px;
		}
		#parrafo1-3{
			font-family:"Arial";
			position:absolute;
			top:140px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#parrafo2-3{
			font-family:"Arial";
			position:absolute;
			top:270px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
			
		}	
		#subguion-3{
			font-family:"Arial";
			position:absolute;
			top:990px;
			left: 240px;
			right: 0px;
			bottom:0px;
			width:500px;
			font-size:17px;
			text-align: center;
		}	
		.p{

		}

		#pagina3huella{
			position:absolute;
			top:920px;
			left:535px;
			right: 0px;
			bottom:0px;
			width:110px;
			height: 130px;
			z-index: 99;
		}
		#pagina3firma{
			position:absolute;
			top:600px;
			left:250px;
			right: 0px;
			bottom:0px;
			width:150px;
			height: 100px;
			z-index: 99;
		}
		#pagina4firma{
			position:absolute;
			top:930px;
			left:320px;
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
			vertical-align: -2px;
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
			line-height:1.2;
			padding-bottom:-15px;
		}
		#firmajosue{
			position:absolute;
			top:750px;
			left:310px;
			right: 0px;
			bottom:0px;
			width:240px;
			height: 130px;
			text-align:center;
		}
		#logoresidente{
			position:absolute;
			right:90px;
			margin-top:-3px;
			width:170px;
			height:70px;
			z-index:auto;
		}
    </style>
</head>
<body>
	<!--HOJA 04-->
	<div>

		<div class="delante estiloletra centro" id="anexo2">ANEXO C</div>
		<div class="delante estiloletra centro" id="declaracion1-3">FORMATO DE DECLARACION DE INGRESO DE TRABAJO TEMPORAL DATOS GENERALES DEL TRABAJADOR</div>
		<div class="delante" id="parrafo1-3">
			<p style="margin-top:-1px; margin-bottom:0px;">Apellidos y Nombres: <?php echo $nombre?></p>
			<p style="margin-top:-1px; margin-bottom:0px;">Domicilio: <?php echo $direccion?></p>
			<p style="margin-top:-1px; margin-bottom:0px;">Tipo de Documento de Identidad: DNI Nº:<?php echo $dni?></p>
			<p style="margin-top:-1px; margin-bottom:0px;">Edad: <?php echo $edad?> Sexo: <?php echo $genero?> Grupo Sanguíneo: <?php echo $gruposanguineo?></p>
			<p style="margin-top:-1px; margin-bottom:0px;">Institución de Procedencia (Razón Social): Soluciones Industriales DEJOTA SAC</p>
		</div>
		<div class="delante" id="parrafo2-3">
			<p><div  class="tamano17 estilogrueso" >CONDICIONES GENERALES </div></p>
			<p style="margin-top:-6px;"><div class="tamano17 espaciop" >Por el presente documento, EL TRABAJADOR TEMPORAL declara conocer que la visita a las instalaciones de la Compañía puede poner en riesgo su salud o su integridad física por encontrarse éste, a más de 4,500 metros sobre el nivel del mar y además por el riesgo propio de las actividades que se desarrollan en dichas instalaciones; no obstante, persiste en su interés en realizar su ingreso, el mismo que realiza de forma voluntaria. 
			</div></p><p style="margin-top:-6px;"><div class="tamano17 espaciop">
			EL TRABAJADOR TEMPORAL se obliga a cumplir todas las disposiciones y medidas de seguridad que establezca la Compañía para la realización de su trabajo temporal, en cuanto a su oportunidad de ingresar a lugares u otras condiciones en que se llevará a cabo su trabajo temporal.
			</div></p ><p style="margin-top:-6px;"><div class="tamano17 espaciop">
			Queda perfectamente establecido que la Compañía, no se responsabilizará por cualquier tipo de daño patrimonial o extra patrimonial como son el daño a l a persona, daño emergente, lucro cesante, daño moral, entre otros; así como cualquier tipo de lesiones o accidentes que pueda sufrir EL TRABAJADOR TEMPORAL debido a la imprudencia de éste o al incumplimiento por parte del mismo con las disposiciones, recomendaciones o medidas de seguridad establecidas
			</div></p><p style="margin-top:-6px;"><div class="tamano17 espaciop">
			La Compañía, se reserva el derecho de iniciar las acciones a que hubiera lugar en caso que EL TRABAJADOR TEMPORAL incumpla alguna de las disposiciones establecidas en el presente documento.
			</div></p><p style="margin-top:-6px;"><div class="tamano17 espaciop">
			EL TRABAJADOR TEMPORAL acepta que toda la información proporcionada a la Compañía, es verdadera, Asimismo declara haber leído todas y cada una de las condiciones generales establecidas en el presente documento, respecto de las cuales manifiesta su plena conformidad, como constancia de todo lo cual firma a continuación.
			</div></p>
		</div>
		<div><img id="pagina4firma" src="<?php echo $imagenfirma;?>"></div>
		<div><img id="pagina3huella" src="<?php echo $imagenhuella;?>"></div>
		<div class="delante " id="subguion-3">
		<p class="izquierda" style="margin-top:2px; margin-bottom:0px;">__________________________________ </p>
		<p class="izquierda" style="margin-top:2px; margin-bottom:0px;">Nombre: <?php echo $nombre?><</p>
		<p class="izquierda" style="margin-top:2px; margin-bottom:0px;">DNI: <?php echo $dni?> </p>
		</div>
		<div class="cuadrado"></div>
	</div>
</body>
</html>