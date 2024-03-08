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
        top: 20px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        font-size: 17px;
    }

    #completar {
        font-family: "ArialB";
        position: absolute;
        top: 50px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        font-size: 9px;
        color: blue;
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
        top: 70px;
        left: -20px;
        right: 0px;
        bottom: 0px;
        width: 200px;
        font-size: 10px;
    }

    #dtrabajo {
        font-family: "ArialB";
        position: absolute;
        top: 200px;
        left: -5px;
        right: 0px;
        bottom: 0px;
        width: 200px;
        font-size: 10px;
    }

    #dsecuencia {
        font-family: "ArialB";
        position: absolute;
        top: 380px;
        left: -25px;
        right: 0px;
        bottom: 0px;
        width: 200px;
        font-size: 10px;
    }

    #daviso {
        font-family: "Arial";
        position: absolute;
        top: 692px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        width: 685px;
        font-size: 10px;
        text-align: justify;
		line-height:0.85;
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
        top: 90px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        font-size: 13px;
    }

    .tabla2 {
        border-collapse: collapse;
        font-family: "arial", "Courier New", "Arial";
        position: absolute;
        top: 119px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        font-size: 13px;
    }

    .tabla3 {
        border-collapse: collapse;
        font-family: "arial", "Courier New", "Arial";
        position: absolute;
        top: 148px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        font-size: 13px;
    }

    .tabla4 {
        border-collapse: collapse;
        font-family: "Arial";
        position: absolute;
        top: 218px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        font-size: 13px;
    }

    .tabla5 {
        border-collapse: collapse;
        font-family: "Arial";
        position: absolute;
        top: 343px;
        left: 30px;
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
        top: 400px;
        left: 30px;
        right: 0px;
        bottom: 0px;
        font-size: 13px;
    }

    .tabla7 {
        border-collapse: collapse;
        font-family: "Arial";
        position: absolute;
        top: 728px;
        left: 30px;
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
        vertical-align: text-top;
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
        align-items: center;
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
        right: 150px;
        margin-top: -20;
        width: 130px;
        height: 50px;
        z-index: auto;
    }
    </style>
</head>

<body>
    <!--HOJA 01-->
    <div>
        <div class="delante tipoletraN centro" id="autorizacion">AUTORIZACION DE TRABAJO TEMPORAL</div>
        <div class="" id="completar">Completar todos los datos solicitados completos sin borrones ni enmendaduras. El
            presente formato no debe ser modificado en ninguna de sus partes.</div>
        <div class="delante estiloletra centro" id="dpersonales">I. DATOS PERSONALES:</div>
        <div class="delante estiloletra centro" id="dtrabajo">II. DESCRIPCIÓNDEL TRABAJO:</div>
        <div class="delante estiloletra centro" id="dsecuencia">III. AUTORIZACIONES:</div>
        <div class="delante estiloletra centro" id="daviso">Las firmas que anteceden corresponden a la conformidad del
            proceso de trabajo temporal, que se efectúa acorde al Decreto Supremo N° 024-2016-EM y sus modificatorias,
            no existiendo vínculo laboral alguno entre el trabajador presentado por la Empresa Contratista y la
            Compañía. Cada supervisor que firma (de Compañía o empresa especializada) se responsabiliza de acuerdo a
            detalle en recuadros ante cualquier eventualidad o contingencia Legal, cotractual y Laboral.</div>

        <table class="tabla1 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">APELLIDOS Y NOMBRES:</div>
                        <div class="tamano12" style="margin-bottom:-3;"><?php echo $nombre?></div>
                    </td>
                    <td class="" width="200px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">DOCUMENTO DE IDENTIDAD:</div>
                        <div class="tamano12" style="margin-bottom:-3;"><?php echo $dni?></div>
                    </td>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">TIPO DE DOCUMENTO:</div>
                        <div class="tamano12" style="margin-bottom:-3;">DNI</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tabla2 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="459px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">EMPRESA DE PROCEDENCIA (RAZÓN
                            SOCIAL):</div>
                        <div class="tamano12" style="margin-bottom:-3;">SOLUCIONES INDUSTRIALES DEJOTA S.A.C.</div>
                    </td>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">RUC (EMPRESA DE PROCEDENCIA):
                        </div>
                        <div class="tamano12" style="margin-bottom:-3;">20542431033</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tabla3 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">OCUPACIÓN / CARGO (Durante el trabajo específico a realizar y de acuerdo a Examen Médico Ocupacional):</div>
                        <div class="tamano12" style="margin-bottom:-3;"><?php echo $cargo?></div>
                    </td>
                    <td class="" width="459px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">DE SCRIPCIÓN DEL TRA BAJO A REALIZAR (Detalle trabajo específico a re alizar):</div>
                        <div class="tamano12" style="margin-bottom:-3;"><?php echo $descripciontrabajo?></div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="tabla4 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">LUGAR DE TRA BAJO (Detalle Zona, Nivel, Oficinas, entre otros):</div>
                        <div class="tamano12" style="margin-bottom:-3;"><?php echo $areatrabajo?></div>
                    </td>
                    <td class="" width="459px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">ÁREA DE TRABAJO:</div>
                        <div class="tamano12 centro" style="font-size:10px; margin-bottom:-3;">SUPERFICIE <?php echo $check1 ?>                    MINA<?php echo $check2 ?></div>
                    </td>
                </tr>
				<tr>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-10;">UNIDAD DE PRODUCCIÓN:</div>
                        <div class="tamano12 centro" style="font-size:10px; margin-bottom:-3;">ALP (X), ROM ( ), VICH-CAR ( )</div>
                    </td>
                    <td class="" width="459px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">AUTORIZA TRABAJO (Supervisor Responsable de Compa ñía Minera Chungar - No tercero):</div>
                        <div class="lineal tamano12" style="margin-bottom:-3;">Nombre: <div class="estilogrueso2"><?php echo $autoriza ?></div></div>
						<div class="lineal tamano12" style="margin-bottom:-3;">Cargo: <div class="estilogrueso2"><?php echo $cargoautoriza ?></div></div>
                    </td>
                </tr>
				<tr>
                    <td class="" width="250px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-4;">COORDINADOR / SUPERVISOR RESPONSABLE EN CAMPO (De empresa Especializada o de Compañía Minera Chungar .):</div>
                        <div class="lineal tamano12" style="margin-bottom:-3;">Nombre: <div  class="estilogrueso2"><?php echo $supervisor ?></div></div>
						<div class="tamano12" style="font-size:10px; margin-bottom:-3;">Cargo: GERENTE DE OPERACIONES</div>
                    </td>
                    <td class="" width="459px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-13; margin-bottom:0;">DURACIÓN DE TRABAJO :</div>
						<div class="lineal tamano12">Desde:    <div class="estilogrueso2"><?php echo $fechainicio?>
                            </div>    Hasta:    <div class="estilogrueso2"><?php echo $fechafin?></div>    Duracion:    
                            <div class="estilogrueso2"><?php echo $dias?></div>    dias</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tabla5 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="718px">
                        <div class="estylotabla" style="font-size:8px; margin-top:-5;">Contacto de Emergencia:</div>
                        <div class="tamano12" style="margin-bottom:-3;">Nombre: <?php echo $familiar?>         Parentesco: <?php echo $parentesco?>     Telefono: <?php echo $fcelular?></div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tabla6 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:6px; padding-bottom:7px;" rowspan="2" class="centro" width="100px">INDUCCION    ANEX 4    </td>
                    <td width="270px" class="tamano10"><div style="margin-top:-20;"> FIRMA DE INDUCCIÓN</div></td>
                    <td width="150px" class="tamano10"><div style="margin-bottom:10;">Nombre.</div><div>Cargo.</div></td>
					<td rowspan="2" width="170px" class="tamano10"><div class="centro" style="margin-bottom:10;">Hora:_________________ HRS</div><div class="centro">Fecha: ________/________/_______</div></td>
                </tr>
                <tr>
                    <td colspan="2"><div style="margin-bottom:-3; margin-top:-2; line-height:0.8;">Responsable de validar inducción brindada o dar conformidad a convalidación de inducción recibida con anterioridad respecto a vigencia, horas y cursosrecibidos.</div></td>
                </tr>
				<tr>
                    <td style="padding-top:6px; padding-bottom:7px;" rowspan="2" class="centro" width="100px">ADMINISTRACIÓN</td>
                    <td width="270px" class="tamano10"><div style="margin-top:-20;"> FIRMA DE ADMINISTRACIÓN</div></td>
                    <td width="150px" class="tamano10"><div style="margin-bottom:10;">Nombre.</div><div>Cargo.</div></td>
					<td rowspan="2" width="170px" class="tamano10"><div class="centro" style="margin-bottom:10;">Hora:_________________ HRS</div><div class="centro">Fecha: ________/________/_______</div></td>
                </tr>
                <tr>
                    <td colspan="2"><div style="margin-bottom:-3; margin-top:-2; line-height:0.8;">Responsable de validar: Examen médicoOcupacional(Vigencia y tipo), SCTRSalud yPensión (Vigencia y tipo), DeclaracionesJuradas Anexos V, B y C.</div></td>
                </tr>
				<tr>
                    <td style="padding-top:6px; padding-bottom:7px;" rowspan="2" class="centro" width="100px">SEGURIDAD Y SALUDOCUPACIONAL</td>
                    <td width="270px" height="65px" class="tamano10"><div style="margin-top:-27;"> FIRMADE SUBGERENTE / SUPERINTENDENTE/JEFATURA A CARGODE SSO EN UNIDAD</div></td>
                    <td width="150px" class="tamano10"><div style="margin-bottom:10;">Nombre.</div><div>Cargo.</div></td>
					<td rowspan="2" width="170px" class="tamano10"><div class="centro" style="margin-bottom:10;">Hora:_________________ HRS</div><div class="centro">Fecha: ________/________/_______</div></td>
                </tr>
                <tr>
                    <td colspan="2"><div style="margin-bottom:-3; margin-top:-2; line-height:0.85;">Ingeniero Responsable de validar y firmar: Anexo 4,recorrido de Anexo 5 (vigente, en campo y exclusivo para el trabajo a realizar en lugar y actividad), acompañado de acta de asistencia, entrevista y conformidad de conocimiento deestándares y procedimientosde Compañía,pudiendo observarsi experiencia laboral y estudiosrealizados para cargo y función a desempeñar durante eltrabajo.</div></td>
                </tr>
            </tbody>
        </table>
        <table class="tabla7 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="" width="300px" height="50px">
                        
                    </td>
                    <td class="" width="409px">
                        <div><img id="logoresidente" src="<?php echo $firmaResidente;?>"></div>
                       
                    </td>
                </tr>
				<tr>
                    <td class="" width="300px">
                        <div class="estylotabla centro" style="font-size:8px;">Firma Supervisor Responsable por autorización de trabajo a realizar de Compañía Minera Chungar - No tercero</div>
                        <div class="tamano12 centro" style="font-size:10px;">Posee la potestad de observar o no la idoneidad de experiencia lab oral y estudios realizados por el colaborador para el cargo a des empeñar durante trabajo</div>
						<div class="estylotabla" style="font-size:8px;">Nombre:</div>
						<div class="estylotabla" style="font-size:8px;">Cargo:</div>
					</td>
                    <td class="" width="409px">
                        <div class="estylotabla centro" style="font-size:8px; margin-top:-5;">Firma Supervisor EN CAMPO Responsable de trabajo a realizar de Emp resa Especializada Responsable declara que personal a su cargo cuenta con experiencia laboral y estudios realizados corroborados e idóneos al car go a des empeñar y asume responsabilidad legal en caso de falsificacio nes o adulteraciones en documentación presentada.</div>
                        <div class="estylotabla" style="font-size:8px;">Nombre:</div>
						<div class="estylotabla" style="font-size:8px;">Cargo:</div>
                    </td>
                </tr>
				<tr>
                    <td colspan="2" class="" width="700px">
                        <div class="estylotabla" style="font-size:12px;">CHECK LIST DOCUMENTOS INDISPENSABLES (SIN EXCEPCIÓN):</div>
						<div class="estylotabla" style="font-size:11px;"><div  class="estilogrueso2"  style="color:red;">1.- FORMATOS ANEXO V, B Y C: </div>Declaraciones Juradas</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">2.- ANEXO 4: </div>Firmado por trabajador, SSO, y capacitador.</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">3.- ANEXO 5 Específico por cada trabajo. </div>Firmado por trabajador, Supervisor responsable de Recorrido en Área de Trabajo (de Volcan), adjuntar Acta de Asistencia con datos completos: Razón social de Empresa Contratista Minera ECM, nombres del trabajador y firma, y datos del supervisor responsable del recorrido (de Volcan Compañía minera S.A.A.) y firma.</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">4.-Copia DNI Vigente.</div></div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">5.-Copia legalizada de contrato visado por Migraciones</div> (aplicable a Extranjeros)</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">6.-Exámen médico </div>(Anexo 16, Pre ocupacional).</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">7.-SCTR Salud y Pensión vigentes</div> por todo el periodo de trabajo solicitado</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">8.-Vida Ley </div>por todo el periodo de trabajo solicitado</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">8.-Cúrriculim Vitae Documentado </div>(copias simples)</div>
						<div class="estylotabla" style="font-size:11px;"><div class="estilogrueso2" style="color:red;">9.-En caso de sub contrataciones: </div>Contrato de prestación de servicios con Empresa Especializada u Orden de Compra y contrato de trabajo del colaborador.</div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>