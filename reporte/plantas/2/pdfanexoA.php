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
    <title>Anexo A</title>
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
    <!--HOJA 02-->
    <div>
        <div class="delante estiloletra centro" id="anexo2">ANEXO A</div>
        <div class="delante estiloletra centro" id="declaracion">DECLARACIÓN JURADA DE VERACIDAD DE DOCUMENTOS EN PASE
            TEMPORAL</div>


        <div class="delante" id="parrafo1">
            <p>
            <div class="tamano17">Yo, <div class="estilogrueso">DANIEL JOSUE ALIAGA TAPIA</div>, identificado con DNI /
                Carnet de Extranjería N° <div class="estilogrueso">44068270</div>, con el cargo de Residente o máxima
                autoridad de la Empresa Especializada <div class="estilogrueso">Soluciones Industriales DEJOTA SAC
                </div>, en la Unidad de <div class="estilogrueso"><?php echo $unidadproduccion?> </div>, certifico bajo Declaración Jurada que
                toda la documentación adjunta al presente formato, siendo estos: Anexo A, Anexo B, Anexo C, Examen
                Médico Ocupacional, SCTR Salud y Pensión, copia DNI, Anexo 4, Anexo 5, Acta de asistencia Anexo 5
                (Recorrido específico en campo y para cada trabajo) y Curriculum Vitae documentado; son veraces,
                originales, copia fiel del original legalizada o simple, pudiendo el Titular Minero verificar y auditar
                la información presentada, así como solicitar información complementaria si así lo considerase.</div>
            </p>
        </div>

        <div class="delante" id="parrafo2">

            <p>
            <div class="tamano17">En caso se detectase que la información adjunta no sea veraz, sea falsificada,
                incompleta y/o adulterada, la Empresa Especializada <div class="estilogrueso">Soluciones Industriales
                    DEJOTA SAC</div>, asumirá todas las responsabilidades y sanciones que se generen como consecuencia
                de la presentación de documentación falsa, adulterada o incompleta.</div>
            </p>
            <p>
            <div class="tamano17"> Así mismo declaro que el personal ingresante cumple con el perfil requerido para la
                ejecución de las funciones designadas al puesto/cargo/ocupación a desempeñar en la Unidad. </div>
            </p>
        </div>

        <div class="delante"><img id="firmajosue" src="<?php echo $firmajosue;?>"></div>
        <div class="delante" id="subguion">
            <p class="p">___________________________________________________ </p>
            <p style="margin-top:-2px; margin-bottom:0px;">Residente o Máxima autoridad en La Unidad</p>
            <p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Nombre: DANIEL JOSUE ALIAGA TAPIA</p>
            <p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">DNI: 44068271</p>
            <p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Cargo: GERENTE GENERAL</p>
        </div>
    </div>

</html>