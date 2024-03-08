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
    <title>Autorizacion</title>
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
            top: 55px;
            left: 50px;
            right: 0px;
            bottom: 0px;
            width:140px;
            height: 70px;
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
            left: 30%;
            bottom: 0px;
            width: 40%;
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
            top: 130px;
            left: 10px;
            right: 0px;
            bottom: 0px;
            width: 200px;
            font-size: 12px;
        }

        #dtrabajo {
            font-family: "ArialB";
            position: absolute;
            top: 300px;
            left: 28px;
            right: 0px;
            bottom: 0px;
            width: 200px;
            font-size: 12px;
        }

        #dsecuencia {
            font-family: "ArialB";
            position: absolute;
            top: 480px;
            left: -42px;
            right: 0px;
            bottom: 0px;
            width: 400px;
            font-size: 11px;
        }

        #daviso {
            font-family: "Arial";
            position: absolute;
            top: 950px;
            left: 58px;
            right: 0px;
            bottom: 0px;
            width: 685px;
            font-size: 11px;
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
            top: 723px;
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
            top: 798px;
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
            top: 110px;
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
            top: 300px;
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
            top: 670px;
            left: 170px;
            right: 0px;
            bottom: 0px;
            width: 500px;
            font-size: 17px;
            text-align: center;
        }

        .cuadrado {
            position: absolute;
            top: 560px;
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
            top: 150px;
            left: 70px;
            right: 0px;
            bottom: 0px;
            width: 80%;
            font-size: 17px;
            text-align: justify;
            line-height: 25px;
        }
        #parrafo1-4 {
            font-family: "Arial";
            position: absolute;
            top: 330px;
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
            top: 570px;
            left: 535px;
            right: 0px;
            bottom: 0px;
            width: 110px;
            height: 130px;
            z-index: 99;
        }

        #pagina3firma {
            position: absolute;
            top: 600px;
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
            vertical-align: -3.6px;
        }

        .estilogrueso2 {
            font-family: 'ArialB';
            display: inline-block;
            vertical-align: -2px;
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
            margin-bottom:0;
            margin-top:-10;
        }
    </style>
</head>

<body>
    <!--HOJA 01-->
    <div>
        <div class="delante"><img id="logo" src="<?php echo $logodj;?>"></div>
        <div class="delante tipoletraN centro" id="autorizacion">AUTORIZACION DE TRABAJO TEMPORAL MENOR A 30 DIAS</div>
        <div class="delante estiloletra centro" id="dpersonales">I. DATOS PERSONALES</div>
        <div class="delante estiloletra centro" id="dtrabajo">II DESCRIPCION DE LA VISITA</div>
        <div class="delante estiloletra centro" id="dsecuencia">III. AUTORIZACIONES (SECUENCIA DE FIRMAS)</div>
        <div class="delante estiloletra centro" id="daviso">Nota: Adjuntar los siguientes documentos: 1) Declaracion Jurada 2) Formato de autorizacion de 
            trabajo menor a 30 dias 3) Anexo 04 Anexo 05 4) Copia DNI 5) Copia de certificado de aptitud médica (el examen médico completo solo se presenta 
            al área médica) 6) SCTR Salud, SCTR pension y vida ley 7) Resumen de experiencia 8)certificados de trabajos que validen la experiencia. 9) 
            Curriculum Vitae 10) Certificados de estudios según la posición que va a desempeñar.</div>

        <div style="line-height:1.3;" class="delante" id="parrafo1-3">
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">1 APELLIDOS Y NOMBRES: <div class="estilogrueso tamano15"><?php echo $nombre?></div></div></p>
            <p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">2 DNI/ CARNE DE EXTRANJERIA: <div class="estilogrueso tamano15"><?php echo $dni?></div>           NACIONALIDAD: <div class="estilogrueso tamano15"> PERUANO</div></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">3 EMPRESA DE PROCEDENCIA: <div class="estilogrueso tamano15"> S. I. DEJOTA SAC.</div>           RUC: <div class="estilogrueso tamano15"> 20542431033</div></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">4 OCUPACION: <div class="estilogrueso tamano15"><?php echo $cargo?></div></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">5 DESCRIPCION DEL TRABAJO A REALIZAR</div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="estilogrueso tamano15">   <?php echo $descripciontrabajo?></div></p>
		</div>         
        <div style="line-height:1.3;" class="delante" id="parrafo1-4">
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">1 UNIDAD DE PRODUCCION: <div class="estilogrueso tamano15"><?php echo $unidadproduccion?></div></div></p>
            <p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">2 AREA DE VISITA: <div class="estilogrueso tamano15"><?php echo $areatrabajo?></div>                                SUPERFICIE: <?php echo $check1?>            MINA: <?php echo $check2?></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">3 AUTORIZA LA VISITA (RESPONSABLE DE CIA/ECM): <div class="estilogrueso tamano15"> <?php echo $autoriza?></div></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">4 COORDINAR O SUPERVISOR DE VISITA (RESPONSABLE DE CIA/ECM): <div class="estilogrueso tamano15"><?php echo $supervisor?></div></div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="tamano12 ">5 DURACION DE VISITA (LA VISITA NO SERA MAYOR DE 30 DIAS )</div></p>
			<p style="margin-top:-1px; margin-bottom:0px;"><div class="lineal tamano12">   FECHA DE INGRESO:    <div class="estilogrueso"><?php echo $fechainicio?>
                            </div>    FECHA DE SALIDA:    <div class="estilogrueso"><?php echo $fechafin?></div>    TOTAL DE DIAS:    
                            <div class="estilogrueso"><?php echo $dias?></div>    dias</div></p>
		</div>       
        
        <table class="tabla4 estiloletra delante" border="1">
            <tbody>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>ADMINISTRADOR Y/O RESIDENTE</div><div>EMPRESA CONTRATISTA</div></td>
                    <td width="334px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div><img id="logoresidente" src="<?php echo $firmaResidente;?>"></div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                </tr>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>SUPERINTENDENCIA DEL ÁREA BAJO RESPONSABILIDAD</div><div></div></td>
                    <td width="334px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div></div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                </tr>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>EXAMÉN MÉDICO</div><div></div></td>
                    <td width="334px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                </tr>
            </tbody>
        </table>
        <table class="tabla5 estiloletra delante" border="1">
            <tbody>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>DESARROLLO HUMANO</div><div>INDUCCIÓN</div></td>
                    <td width="184px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                    <td width="141px"><div style="margin-top:30;text-align:center;">NOTA</div></td>
                </tr>

            </tbody>
        </table>
        <table class="tabla6 estiloletra delante" border="1">
            <tbody>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>SUPERINTENDENCIA DE SEGURIDAD</div><div></div></td>
                    <td width="334px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div></div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                </tr>
                <tr>
                    <td class="centro" style="padding-top:20px; padding-bottom:20px;" width="334px"><div>GESTIÓN DE PERSONAL CONTRATISTA</div><div></div></td>
                    <td width="334px"><div style="margin-top:-3;">(FIRMA Y SELLO)</div><div><div style="margin-top:27;text-align:right;">FECHA.....................................</div></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>