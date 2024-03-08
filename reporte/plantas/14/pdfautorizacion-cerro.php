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
    </style>
</head>

<body>
    <!--HOJA 01-->
    <div>
        <div class="delante"><img id="logo" src="<?php echo $logodj;?>"></div>
        <div class="delante tipoletraN centro" id="autorizacion">AUTORIZACION DE TRABAJO TEMPORAL</div>
        <div class="delante estiloletra centro" id="dpersonales">DATOS PERSONALES</div>
        <div class="delante estiloletra centro" id="dtrabajo">DESCRIPCIÓNDEL TRABAJO</div>
        <div class="delante estiloletra centro" id="dsecuencia">AUTORIZACIONES (SECUENCIA DE FIRMAS)</div>
        <div class="delante estiloletra centro" id="daviso">Las firmas que anteceden corresponden a la conformidad del
            proceso de trabajo temporal, que se efectúa acorde al Decreto Supremo N° 024-2016-EM y sus modificatorias,
            no existiendo vínculo laboral alguno entre el trabajador presentado por la Empresa Contratista y la
            Compañía. Cada supervisor que firma (de Compañía o empresa especializada) se responsabiliza de acuerdo a
            detalle en recuadros ante cualquier eventualidad o contingencia Legal, cotractual y Laboral.</div>

        <table class="tabla1 estiloletra " border="1">
            <tbody>
                <tr>
                    <td class="colorplomo" width="500px">
                        <div class="estylotabla">APELLIDOS Y NOMBRES:</div>
                    </td>
                    <td class="colorplomo" width="168px">DNI:</td>
                </tr>
                <tr>
                    <td>
                        <div class="tamano12"><?php echo $nombre?></div>
                    </td>
                    <td>
                        <div class="centro tamano12"><?php echo $dni ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="colorplomo izquierda">RAZON SOCIAL:</td>
                    <td class="colorplomo izquierda">RUC:</td>
                </tr>
                <tr>
                    <td>
                        <div class="tamano12">SOLUCIONES INDUSTRIALES DEJOTA S.A.C.</div>
                    </td>
                    <td>
                        <div class="centro tamano12">20542431033</div>
                    </td>
                </tr>
            </tbody>

        </table>
        <table class="tabla2 estiloletra" border="1">
            <tbody>
                <tr>
                    <td class="colorplomo izquierda" width="368px" style="padding-top:4px;padding-bottom:4px;">
                        DESCRIPCIÓN DEL TRABAJO A REALIZAR:</td>
                    <td class="colorplomo izquierda" width="300px">OCUPACIÓN / CARGO:</td>
                </tr>
                <tr>
                    <td style="padding-top:10px; padding-bottom:10px;"><?php echo $descripciontrabajo ?></td>
                    <td class="centro"><?php echo $cargo ?></td>
                </tr>
            </tbody>
        </table>
        <table class="tabla3 estiloletra" border="1">
            <tbody>
                <tr>
                    <td class="colorplomo izquierda" width="368px">LUGAR DE TRABAJO:</td>
                    <td class="colorplomo izquierda" width="300px">AREA DE TRABAJO:</td>
                </tr>
                <tr>
                    <td style="padding-top:4px; padding-bottom:4px;"><?php echo $planta ?></td>
                    <td class="centro">SUPERFICIE <?php echo $check1 ?>             MINA<?php echo $check2 ?></td>
                </tr>
                <tr>
                    <td class="colorplomo izquierda" style="padding-top:4px; padding-bottom:4px;" width="368px">AUTORIZA
                        TRABAJO(SupervisorResponsableCompañía)</td>
                    <td class="colorplomo izquierda" width="300px">SUPERVISOR RESPONSABLE EN CAMPO</td>
                </tr>
                <tr>
                    <td><?php echo $autoriza ?></td>
                    <td class="centro"><?php echo $supervisor ?></td>
                </tr>
                <tr>
                    <td><?php echo $cargoautoriza ?></td>
                    <td class="centro"><?php echo $cargosupervisor ?></td>
                </tr>
            </tbody>
        </table>
        <table class="tabla3-1 estiloletra" border="1">
            <tbody>
                <tr>
                    <td class="colorplomo izquierda" width="677px">DURACIÓN DE TRABAJO:</td>
                </tr>
                <tr>
                    <td style="padding-top:5px; padding-bottom:5px;">
                        <div class=" lineal tamano12">Desde:    <div class="estilogrueso2"><?php echo $fechainicio?>
                            </div>    Hasta:    <div class="estilogrueso2"><?php echo $fechafin?></div>    Duracion:    
                            <div class="estilogrueso2"><?php echo $dias?></div>    dias</div>
                    </td>
                </tr>
                <tr>
                    <td class="colorplomo izquierda" width="368px">Contacto en Caso de Emergencia:</td>
                </tr>
                <tr>
                    <td style="padding-top:5px; padding-bottom:5px;">Nombre: <?php echo $familiar?> Parentesco:
                        <?php echo $parentesco?> Telefono: <?php echo $fcelular?></td>
                </tr>
            </tbody>
        </table>
        <table class="tabla4 estiloletra delante" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:30px; padding-bottom:30px;" width="334px"></td>
                    <td width="334px"><img id="logoresidente" src="<?php echo $firmaResidente;?>"></td>
                </tr>
                <tr>
                    <td class="centro">
                        <p style="margin-top:-2px; margin-bottom:0px;">SUPERINTENDENTE DE AREA</p>NOMBRE:
                        <?php echo $superintendente?>
                    </td>
                    <td class="centro">
                        <p style="margin-top:-2px; margin-bottom:0px; ">RESIDENTE EMPRESA CONTRATISTA</p>NOMBRE:
                        <?php echo $residente?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tabla5 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:6px; padding-bottom:7px;" rowspan="2" class="centro" width="100px">INDUCCION
                           ANEX 4    </td>
                    <td rowspan="2" width="320px" class="tamano10">
                        <div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div>
                    </td>
                    <td width="239px" class="tamano10">Responsable de validar la inducción.</td>
                </tr>
                <tr>
                    <td>FECHA:                    /                    /</td>
                </tr>
            </tbody>
        </table>
        <table class="tabla6 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:8px; padding-bottom:8px;" rowspan="2" class="centro" width="100px">ÁREA
                        MÉDICA</td>
                    <td rowspan="2" width="320px" class="tamano10">
                        <div id="posicion"> FIRMAY NOMBRE DELMEDICO OCUPACIONAL </div>
                    </td>
                    <td width="239px" class="tamano10">Resp. de validar: Sist. Personal, Anexos, Examen médico y SCTR.
                    </td>
                </tr>
                <tr>
                    <td>FECHA:                    /                    /</td>
                </tr>
            </tbody>
        </table>
        <table class="tabla7 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:13px; padding-bottom:13px;" class="centro" width="100px">GESTIÓN DE
                        CONTRATISTAS</td>
                    <td width="320px" class="tamano10">
                        <div id="posicion"> FIRMA Y NOMBRE DE GESTIÓN DE CONTRATISTAS</div>
                    </td>
                    <td width="239px" class="tamano10">FECHA:                    /                    /</td>
                </tr>
            </tbody>
        </table>
        <table class="tabla8 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:2px; padding-bottom:2px;" rowspan="2" class="centro" width="100px">SEGURIDAD
                           Y SALUD    OCUPACIONAL</td>
                    <td rowspan="2" width="320px" class="tamano10">
                        <div id="posicion"> FIRMA Y NOMBRE DE SSO</div>
                    </td>
                    <td width="239px" class="tamano10">Responsable de validar la inducción.</td>
                </tr>
                <tr>
                    <td>FECHA:                    /                    /</td>
                </tr>
            </tbody>
        </table>
        <table class="tabla9 estiloletra" border="1">
            <tbody>
                <tr>
                    <td style="padding-top:17px; padding-bottom:17px;" class="centro" width="100px">GERENCIA DE
                        OPERACIONES</td>
                    <td width="320px" class="tamano10">
                        <div id="posicion"> FIRMAY NOMBRE DE GERENCIA</div>
                    </td>
                    <td width="239px" class="tamano10">FECHA:                    /                    /</td>
                </tr>
            </tbody>
        </table>
        <table class="tablafin estiloletra">
            <tbody>
                <tr>
                    <td width="334px">
                        <p style="margin-top:-1px; margin-bottom:0px;">CHECKLIST DOCUMENTOS INDISPENSABLES
                            (SINEXCEPCIÓN):</p>
                        <p style="margin-top:-1px; margin-bottom:0px;">1. Formatos Anexo A, B Y C</p>
                        <p style="margin-top:-1px; margin-bottom:0px;">2. Exámen Médico con el V°B° del Medico de
                            Paragsha (Vigente)</p>
                        <p style="margin-top:-1px; margin-bottom:0px;">3. SCTR Salud y Pensión; Seguro Vida Ley
                            (Vigente)</p>
                    </td>
                    <td width="334px">
                        <p style="margin-top:-1px; margin-bottom:0px;">4. Orden de compra u Orden de Servicio / Contrato
                        </p>
                        <p style="margin-top:-1px; margin-bottom:0px;">5. Anexo 4 y Anexo 5 (Acta de Asistencia mínimo 8
                            horas)</p>
                        <p style="margin-top:-1px; margin-bottom:0px;">6. Copia DNI Vigente </p>
                        <p style="margin-top:-1px; margin-bottom:0px;">7. CV Documentado y Contrato de Trabajo Vigente
                            entre Empleador y Colaborador</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>