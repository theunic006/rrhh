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
    <title>Carta</title>
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

		body {
			font-family: 'Arial';
		}

		.delante {
			z-index: 99;
		}

		.centro {
			text-align: center;
		}

		.izquierda {
			text-align: left;
		}

		.negrita {}

		.tamano9 {
			font-size: 9px;
		}

		.tamano10 {
			font-size: 10px;
		}

		.tamano11 {
			font-size: 11px;
		}

		.tamano12 {
			font-size: 12px;
		}

		.tamano15 {
			font-size: 15px;
		}

		.tamano17 {
			font-size: 17px;
		}

		#logo {
			position: absolute;
			top: 10px;
			left: 50px;
			right: 0px;
			bottom: 0px;
			width: 150px;
			height: 80px;
		}

		#nombre {
			font-family: "ArialB";

			position: absolute;
			top: 128px;
			left: 75px;
			right: 0px;
			bottom: 0px;
			width: 400px;
			font-size: 13px;

		}

		#dni {
			font-family: "arial", "Courier New", "ArialB";
			position: absolute;
			top: 128px;
			left: 585px;
			right: 0px;
			bottom: 0px;
			width: 100px;
			font-size: 13px;
		}

		#cargo {
			font-family: "arial", "Courier New", "ArialB";
			position: absolute;
			top: 228px;
			left: 500px;
			right: 0px;
			bottom: 0px;
			width: 200px;
			font-size: 13px;
		}

		#autorizacion {
			font-family: "ArialB";
			position: absolute;
			top: 50px;
			right: 0px;
			bottom: 0px;
			width: 100%;
			font-size: 17px;
		}

		#anexo2 {
			font-family: "ArialB";
			position: absolute;
			top: 50px;
			right: 0px;
			bottom: 0px;
			width: 100%;
			font-size: 17px;
		}

		#dpersonales {
			font-family: "ArialB";
			position: absolute;
			top: 90px;
			left: 10px;
			right: 0px;
			bottom: 0px;
			width: 200px;
			font-size: 12px;
		}

		#dtrabajo {
			font-family: "ArialB";
			position: absolute;
			top: 263px;
			left: 28px;
			right: 0px;
			bottom: 0px;
			width: 200px;
			font-size: 12px;
		}

		#dsecuencia {
			font-family: "ArialB";
			position: absolute;
			top: 610px;
			left: -42px;
			right: 0px;
			bottom: 0px;
			width: 400px;
			font-size: 11px;
		}

		#daviso {
			font-family: "Arial";
			position: absolute;
			top: 940px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			width: 685px;
			font-size: 10px;
			text-align: justify;
		}

		.colorplomo {
			background: #7f7f7f;
			font-family: "ArialB";
			color: #FFF;
			padding-top: 0px;
			padding-bottom: 0px;
		}

		td {
			padding: 4px;
			font-size: 11px;
		}

		.tabla1 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 105px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla2 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 195px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla3 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 278px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla3-1 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 400px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla4 {
			border-collapse: collapse;
			font-family: "Arial";
			position: absolute;
			top: 500px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla5 {
			border-collapse: collapse;
			font-family: "Arial";
			position: absolute;
			top: 627px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		#posicion {
			position: relative;
			top: -22px;
			font-size: 10px;
		}

		.tabla6 {
			border-collapse: collapse;
			font-family: "Arial";
			position: absolute;
			top: 688px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla7 {
			border-collapse: collapse;
			font-family: "Arial";
			position: absolute;
			top: 753px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla8 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 813px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tabla9 {
			border-collapse: collapse;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 874px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 13px;
		}

		.tablafin {
			border-top: 1px solid black;
			font-family: "arial", "Courier New", "Arial";
			position: absolute;
			top: 990px;
			left: 58px;
			right: 0px;
			bottom: 0px;
			font-size: 10px;
		}

		/*PAGINA 2*/


		#declaracion {
			font-family: "ArialB";
			position: absolute;
			top: 80px;
			left: 0px;
			right: 0px;
			bottom: 0px;
			width: 100%;
			font-size: 17px;
		}

		#parrafo1 {
			font-family: "Arial";
			position: absolute;
			top: 50px;
			left: 70px;
			right: 0px;
			bottom: 0px;
			width: 80%;
			font-size: 17px;
			text-align: justify;
			line-height: 25px;
		}

		#parrafo2 {
			font-family: "Arial";
			position: absolute;
			top: 420px;
			left: 70px;
			right: 0px;
			bottom: 0px;
			width: 80%;
			font-size: 17px;
			text-align: justify;
			line-height: 25px;
		}

		#subguion {
			font-family: "Arial";
			position: absolute;
			top: 840px;
			left: 270px;
			right: 0px;
			bottom: 0px;
			width: 350px;
			font-size: 17px;
			text-align: center;
		}

		/*PAGINA 3*/
		#parrafo2-2 {
			font-family: "Arial";
			position: absolute;
			top: 270px;
			left: 70px;
			right: 0px;
			bottom: 0px;
			width: 80%;
			font-size: 17px;
			text-align: justify;
			line-height: 25px;
		}

		#subguion-2 {
			font-family: "Arial";
			position: absolute;
			top: 970px;
			left: 170px;
			right: 0px;
			bottom: 0px;
			width: 500px;
			font-size: 17px;
			text-align: center;
		}

		.cuadrado {
			position: absolute;
			top: 860px;
			left: 530px;
			right: 0px;
			bottom: 0px;
			width: 120px;
			/* Ancho de 150 píxeles */
			height: 150px;
			/* Alto de 150 píxeles */
			/* Fondo de color rojo */
			border: 1px solid #000;
			/* Borde color negro y de 1 píxel de grosor */
		}

		/*PAGINA 3*/

		#declaracion1-3 {
			font-family: "ArialB";
			position: absolute;
			top: 80px;
			left: 96px;
			right: 0px;
			bottom: 0px;
			width: 75%;
			font-size: 17px;
		}

		#parrafo1-3 {
			font-family: "Arial";
			position: absolute;
			top: 140px;
			left: 70px;
			right: 0px;
			bottom: 0px;
			width: 80%;
			font-size: 17px;
			text-align: justify;
			line-height: 25px;
		}

		#parrafo2-3 {
			font-family: "Arial";
			position: absolute;
			top: 270px;
			left: 70px;
			right: 0px;
			bottom: 0px;
			width: 80%;
			font-size: 17px;
			text-align: justify;
			line-height: 25px;

		}

		#subguion-3 {
			font-family: "Arial";
			position: absolute;
			top: 990px;
			left: 240px;
			right: 0px;
			bottom: 0px;
			width: 500px;
			font-size: 17px;
			text-align: center;
		}

		.p {}

		#pagina3huella {
			position: absolute;
			top: 870px;
			left: 535px;
			right: 0px;
			bottom: 0px;
			width: 110px;
			height: 130px;
			z-index: 99;
		}

		#pagina3firma {
			position: absolute;
			top: 900px;
			left: 250px;
			right: 0px;
			bottom: 0px;
			width: 150px;
			height: 100px;
			z-index: 99;
		}

		#pagina4firma {
			position: absolute;
			top: 930px;
			left: 320px;
			right: 0px;
			bottom: 0px;
			width: 150px;
			height: 100px;
			z-index: 99;
		}

		.estilogrueso {
			font-family: 'ArialB';
			display: inline-block;
			vertical-align: text-top;
		}

		.estilogrueso2 {
			font-family: 'ArialB';
			display: inline-block;
			vertical-align: -5.5;
		}

		.estilo {
			font-family: 'Arial';
		}

		.lineal {
			display: flex;
			justify-content: space-between;
			align-items: center;/
		}

		.espaciop {
			line-height: 1.2;
			padding-bottom: -15px;
		}

		#firmajosue {
			position: absolute;
			top: 750px;
			left: 310px;
			right: 0px;
			bottom: 0px;
			width: 240px;
			height: 130px;
			text-align: center;
		}

		#logoresidente {
			position: absolute;
			right: 90px;
			margin-top: -3px;
			width: 170px;
			height: 70px;
			z-index: auto;
		}

		#expide {
			position: absolute;
			top: 780px;
			left: 0px;
			right: 100px;
			bottom: 0px;
			font-size: 15px;
			text-align: right;
		}

		.estilogrueso3 {
			font-family: 'ArialB';
			display: inline-block;
			vertical-align: -2.8px;
		}

		ul {
			list-style: none;
		}
    </style>
</head>

<body>

    <!--HOJA 03-->
    <div>
        <div class="delante estiloletra centro" id="anexo2">CARTA VOLUNTARIA DE COMPROMISO</div>
        <div class="delante" id="parrafo1">
            <p>
            <div class="tamano15">Yo, <div class="estilogrueso"><?php echo $nombre?></div>, de Nacionalidad <div
                    class="estilogrueso">PERUANO</div>, identificado con Documento de Nacional de Identidad – DNI N°
                <div class="estilogrueso"><?php echo $dni?></div>, domiciliado en <div class="estilogrueso">
                    <?php echo $direccion?></div>, Distrito de <div class="estilogrueso"><?php echo $distrito?></div>
                Provincia de <div class="estilogrueso"><?php echo $provincia?></div>, Departamento de <div
                    class="estilogrueso"><?php echo $departamento?></div>;
                trabajador de la Empresa Contratista <div class="estilogrueso">S.I. DEJOTA SAC</div>, encontrándome en
                la condición de (Trabajador Nuevo o Trabajador antiguo), en uso pleno de mis facultades
                y libre determinación, <div class="estilogrueso">ACEPTO EL RETIRO O CESE INMEDIATO</div> de mi empresa y
                de la UNIDAD MINERA <div class="estilogrueso"><?php echo $unidadproduccion?></div>
                perteneciente a <div class="estilogrueso"><?php echo $planta?></div> así como asumir las sanciones
                respectivas, en los siguientes casos:
            </div>
            </p>
        </div>
        <div class="delante" id="parrafo2-2">
            <ul class="tamano15">
                <li><input type="checkbox" checked>   Ingresar a laborar en evidente estado de ebriedad, haber ingerido
                    alcohol o drogas dentro de la Unidad        Minera y en horas de trabajo, a solo informe de
                    Seguridad Patrimonial.</li>
                <li><input type="checkbox" checked>  Falta de Respeto grave a un Jefe inmediato y/o agresión Física a un
                    compañero dentro de las        instalaciones de la Unidad Minera <div class="estilogrueso2">
                        <?php echo $unidadproduccion?></div>.</li>
                <li><input type="checkbox" checked>  Al verme involucrado en sustracción de dinero, material o equipo
                    que no sean de mi pertenencia, a        solo informe de Seguridad Patrimonial o en Flagrancia</li>
                <li><input type="checkbox" checked>    Al haber presentado documentos falsificados requeridos para mi
                    ingreso.</li>
                <li><input type="checkbox" checked>   Provocar accidente a un compañero y/o tercero debido a mi
                    negligencia o incumplimiento del        procedimiento.</li>
                <li><input type="checkbox" checked>    Provocar Choque o Siniestro de vehículo o equipo con agravante de
                    manipular o conducir sin                      autorización respectiva.</li>
                <li><input type="checkbox" checked>    Abandono de trabajo sin justificación alguna y sin dar
                    conocimiento a mi Gerencia.</li>
                <li><input type="checkbox" checked>    Al serSentenciado con pena efectiva o suspendida en un proceso de
                    Violencia Familiar, Física, Sexual,          Psicológica y Económica en contra de los integrantes de
                    mi círculo familiar.</li>
            </ul>
            <p class="tamano15">En virtud de aceptación de lo antedicho, firmo de forma voluntaria el presente documento
            </p>
        </div>
        <div id="expide" class="tamano15">CERRO DE PASCO a los <div class="estilogrueso3"><?php echo $dia?></div> día(s) de <div
                class="estilogrueso3"><?php echo $mes?></div> del <div class="estilogrueso3"><?php echo $año?></div>
        </div>

        <div>

            <div><img id="pagina3firma" src="<?php echo $imagenfirma;?>"></div>
            <div><img id="pagina3huella" src="<?php echo $imagenhuella;?>"></div>
            <div class="delante " id="subguion-2">
                <p class="izquierda">___________________________________________ </p>
                <p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Nombre: <?php echo $nombre?></p>
                <p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">DNI: <?php echo $dni?> </p>
            </div>
            <div class="cuadrado"></div>

        </div>

</body>

</html>