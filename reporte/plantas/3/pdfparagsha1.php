<?php

$fecha = date("Y-m-d");

$path = '../../logo.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logodj = 'data:image/' . $type . ';base64,' . base64_encode($data);

$path = 'Proyecto_nuevo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$fondo = 'data:image/' . $type . ';base64,' . base64_encode($data);


?>

<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
    <style>
        
		@font-face{
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: normal;
			src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
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
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:128px;
			left:75px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:13px;

		}
		#dni{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;

			top:128px;
			left:585px;
			right: 0px;
			bottom:0px;
			width:100px;
			font-size:13px;
		}
		#cargo{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:228px;
			left:500px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:13px;
		}
		#autorizacion, #anexo2{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:50px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#dpersonales{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:90px;
			left:30px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:15px;
		}
		#dtrabajo{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:270px;
			left:58px;
			right: 0px;
			bottom:0px;
			width:200px;
			font-size:15px;
		}
		#dsecuencia{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:620px;
			left:25px;
			right: 0px;
			bottom:0px;
			width:400px;
			font-size:15px;
		}
		#daviso{
			font-family: "arial", "Courier New", monospace;
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
			font-weight: bold;
		}
		td{
			padding:4px;
		}
		.tabla1{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:105px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla2{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:195px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla3{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:288px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla3-1{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:410px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}

		.tabla4{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:510px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla5{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:640px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		#posicion{
			position:relative;
			top:-22px;
		}
		.tabla6{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:701px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla7{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:762px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla8{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:823px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tabla9{
			border-collapse: collapse;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:884px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		.tablafin{
			border-top: 1px solid black;
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:1010px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:10px;
		}

				/*PAGINA 2*/


		#declaracion{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:80px;
			left:0px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#parrafo1{
			font-family: "arial", "Courier New", monospace;
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
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:470px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#subguion{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:840px;
			left: 170px;
			right: 0px;
			bottom:0px;
			width:500px;
			font-size:17px;
			text-align: center;
		}	

			/*PAGINA 3*/
		#parrafo2-2{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:360px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#subguion-2{
			font-family: "arial", "Courier New", monospace;
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
			top:560px;
			left: 530px;
			right: 0px;
			bottom:0px;
			width: 120px;           /* Ancho de 150 píxeles */
			height: 150px;          /* Alto de 150 píxeles */
			background: white;        /* Fondo de color rojo */
			border: 1px solid #000; /* Borde color negro y de 1 píxel de grosor */
		}

			/*PAGINA 3*/

		#declaracion1-3{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:80px;
			left:56px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
		}
		#parrafo1-3{
			font-family: "arial", "Courier New", monospace;
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
			font-family: "arial", "Courier New", monospace;
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
		#subguion-2{
			font-family: "arial", "Courier New", monospace;
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
			word-spacing:-5px;
			letter-spacing: -0.5px;
		}
    </style>
</head>
<body>
	<div>
		<div class="delante" ><img id="logo" src="<?php echo $logodj;?>"></div>
		<div class="delante estiloletra centro" id="autorizacion">AUTORIZACION DE TRABAJO TEMPORAL</div>
		<div class="delante estiloletra centro" id="dpersonales">DATOS PERSONALES</div>
		<div class="delante estiloletra centro" id="dtrabajo">DESCRIPCIÓNDEL TRABAJO</div>
		<div class="delante estiloletra centro" id="dsecuencia">AUTORIZACIONES (SECUENCIA DE FIRMAS)</div>
		<div class="delante estiloletra centro" id="daviso">Las firmas que anteceden corresponden a la conformidad del proceso de trabajo temporal, que se efectúa acorde al Decreto Supremo N° 024-2016-EM y sus modificatorias, no existiendo vínculo laboral alguno entre el trabajador presentado por la Empresa Contratista y la Compañía. Cada supervisor que firma (de Compañía o empresa especializada) se responsabiliza de acuerdo a detalle en recuadros ante cualquier eventualidad o contingencia Legal, cotractual y Laboral.</div>

		<table class="tabla1 estiloletra" border="1">
			<tbody>
				<tr>
				<td class="colorplomo izquierda" width="500px">APELLIDOS Y NOMBRES:</td>
				<td class="colorplomo izquierda" width="168px">DNI:</td>
				</tr>
				<tr>
				<td><?php echo $nombre ?></td>
				<td class="centro"><?php echo $dni ?></td>
				</tr>
				<tr>
				<td class="colorplomo izquierda">RAZON SOCIAL:</td>
				<td class="colorplomo izquierda">RUC:</td>
				</tr>
				<tr>
				<td>SOLUCIONES INDUSTRIALES DEJOTA S.A.C.</td>
				<td class="centro">20542431033</td>
				</tr>
			</tbody>
			
		</table>
		<table  class="tabla2 estiloletra" border="1">
			<tbody>
				<tr>
				<td class="colorplomo izquierda" width="368px">DESCRIPCIÓN DEL TRABAJO A REALIZAR:</td>
				<td class="colorplomo izquierda" width="300px">OCUPACIÓN / CARGO:</td>
				</tr>
				<tr>
				<td style="padding-top:10px; padding-bottom:10px;">NO TENGO DATOS</td>
				<td class="centro"><?php echo $cargo ?></td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla3 estiloletra" border="1">
			<tbody>
				<tr>
				<td class="colorplomo izquierda" width="368px">LUGAR DE TRABAJO:</td>
				<td class="colorplomo izquierda" width="300px">AREA DE TRABAJO:</td>
				</tr>
				<tr>
				<td style="padding-top:7px; padding-bottom:7px;">PARAGSHA</td>
				<td class="centro">NO TENGO DATOS</td>
				</tr>
				<tr>
				<td class="colorplomo izquierda" style="padding-top:7px; padding-bottom:7px;" width="368px">AUTORIZA TRABAJO(SupervisorResponsableCompañía)</td>
				<td class="colorplomo izquierda" width="300px">SUPERVISOR RESPONSABLE EN CAMPO</td>
				</tr>
				<tr>
				<td>NO TENGO DATOS</td>
				<td class="centro">NO TENGO DATOS</td>
				</tr>
				<tr>
				<td>NO TENGO DATOS</td>
				<td class="centro">NO TENGO DATOS</td>
				</tr>
			</tbody>
		</table>	
		<table  class="tabla3-1 estiloletra" border="1">
			<tbody>
				<tr>
				<td class="colorplomo izquierda" width="677px">DURACIÓN DE TRABAJO:</td>
				</tr>
				<tr>
				<td style="padding-top:5px; padding-bottom:5px;">Desde:   Hasta:   Duracion:</td>
				</tr>
				<tr>
				<td class="colorplomo izquierda" width="368px">Contacto en Caso de Emergencia:</td>
				</tr>
				<tr>
				<td style="padding-top:5px; padding-bottom:5px;">Nombre:  Parentesco:  Telefono:</td>
				</tr>
			</tbody>
		</table>	
		<table  class="tabla4 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:30px; padding-bottom:30px;" width="334px"></td>
				<td width="334px"></td>
				</tr>
				<tr>
				<td class="centro"><p style="margin-top:-2px; margin-bottom:0px; font-weight: bold;">SUPERINTENDENTE DE AREA</p>AQUI SU NOMBRE</td>
				<td class="centro"><p style="margin-top:-2px; margin-bottom:0px; font-weight: bold;">RESIDENTE EMPRESA CONTRATISTA</p>AQUI SU NOMBRE</td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla5 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:8px; padding-bottom:8px;" rowspan="2" class="centro" width="100px">INDUCCION ANEX 4</td>
				<td rowspan="2" width="320px" class="tamano10"><div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div></td>
				<td width="239px" class="tamano10">Responsable de validar la inducción.</td>
				</tr>
				<tr>
				<td>FECHA: / /</td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla6 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:11px; padding-bottom:12px;" rowspan="2" class="centro" width="100px">ÁREA MÉDICA</td>
				<td rowspan="2" width="320px" class="tamano10"><div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div></td>
				<td width="239px" class="tamano10">Resp. de validar: Sist. Personal, Anexos, Examen médico y SCTR.</td>
				</tr>
				<tr>
				<td>FECHA: / /</td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla7 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:16px; padding-bottom:17px;" class="centro" width="100px">GESTIÓN DE CONTRATISTAS</td>
				<td width="320px" class="tamano10"><div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div></td>
				<td width="239px" class="tamano10">FECHA: / /</td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla8 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:4px; padding-bottom:5px;" rowspan="2" class="centro" width="100px">SEGURIDAD Y SALUD OCUPACIONAL</td>
				<td rowspan="2" width="320px" class="tamano10"><div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div></td>
				<td width="239px" class="tamano10">Responsable de validar la inducción.</td>
				</tr>
				<tr>
				<td>FECHA: / /</td>
				</tr>
			</tbody>
		</table>
		<table  class="tabla9 estiloletra" border="1">
			<tbody>
				<tr>
				<td style="padding-top:17px; padding-bottom:17px;" class="centro" width="100px">GERENCIA DE OPERACIONES</td>
				<td width="320px" class="tamano10"><div id="posicion"> FIRMA Y NOMBRE DE INDUCCIÓN</div></td>
				<td width="239px" class="tamano10">FECHA: / /</td>
				</tr>
			</tbody>
		</table>
		<table  class="tablafin estiloletra">
			<tbody>
				<tr>
				<td width="334px">
					<p style="margin-top:-1px; margin-bottom:0px;">CHECKLIST DOCUMENTOS INDISPENSABLES (SINEXCEPCIÓN):</p>
					<p style="margin-top:-1px; margin-bottom:0px;">1. Formatos Anexo A, B Y C</p>
					<p style="margin-top:-1px; margin-bottom:0px;">2. Exámen Médico con el V°B° del Medico de Paragsha (Vigente)</p>
					<p style="margin-top:-1px; margin-bottom:0px;">3. SCTR Salud y Pensión; Seguro Vida Ley (Vigente)</p>
				</td>
				<td width="334px">
					<p style="margin-top:-1px; margin-bottom:0px;">4. Orden de compra u Orden de Servicio / Contrato</p>
					<p style="margin-top:-1px; margin-bottom:0px;">5. Anexo 4 y Anexo 5 (Acta de Asistencia mínimo 8 horas)</p>
					<p style="margin-top:-1px; margin-bottom:0px;">6. Copia DNI Vigente	</p>
					<p style="margin-top:-1px; margin-bottom:0px;">7. CV Documentado y Contrato de Trabajo Vigente entre Empleador y Colaborador</p>
				</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div>
		<div style="page-break-after:always;"></div>   <!--SIGUIENTE PÁGINA-->

		<div class="delante estiloletra centro" id="anexo2">ANEXO A</div>
		<div class="delante estiloletra centro" id="declaracion">DECLARACIÓN JURADA DE VERACIDAD DE DOCUMENTOS EN PASE 	TEMPORAL</div>


		<div class="delante" id="parrafo1">
			<p class="p">Yo,__________________________________________________________, identificado con DNI / Carnet de Extranjería N°__________________________, con el cargo de Residente o máxima autoridad de la Empresa Especializada_________________________________________________, en la Unidad de _________________________________, certifico bajo Declaración Jurada que toda la documentación adjunta al presente formato, siendo estos: Anexo A, Anexo B, Anexo C, Examen Médico Ocupacional, SCTR Salud y Pensión, copia DNI, Anexo 4, Anexo 5, Acta de asistencia Anexo 5 (Recorrido específico en campo y para cada trabajo) y Curriculum Vitae documentado; son veraces, originales, copia fiel del original legalizada o simple, pudiendo el Titular Minero verificar y auditar la información presentada, así como solicitar información complementaria si así lo considerase.</p>
		</div>

		<div class="delante" id="parrafo2">
			<p class="p">En caso se detectase que la información adjunta no sea veraz, sea 		falsificada, incompleta y/o adulterada, la Empresa Especializada ______________________________________________, asumirá todas las responsabilidades y sanciones que se generen como consecuencia de la presentación de documentación falsa, adulterada o incompleta.</p>
			<p class="p"> Así mismo declaro que el personal ingresante cumple con el perfil requerido para la ejecución de las funciones designadas al puesto/cargo/ocupación a desempeñar en la Unidad.  </p>
		</div>

		<div class="delante" id="subguion"><p class="p">___________________________________________________ </p>
		<p style="margin-top:-2px; margin-bottom:0px;">Residente o Máxima autoridad en La Unidad</p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Nombre: <b>DANIEL JOSUE ALIAGA TAPIA</b></p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">DNI:<b> 44068271<b> </p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Cargo: <b>GERENTE GENERAL</b></p>
		</div>
	</div>

	<div>
		<div style="page-break-after:always;"></div>   <!--SIGUIENTE PÁGINA-->

		<div class="delante estiloletra centro" id="anexo2">ANEXO B</div>
		<div class="delante estiloletra centro" id="declaracion">DECLARACIÓN JURADA</div>
		<div class="delante" id="parrafo1">
			<p class="p">Yo,________________________________________________________, identificado con DNI / Carnet de Extranjería N°__________________________, domiciliado en _____________________________________________________________, Distrito de ____________________________ Provincia de _______________________, Departamento de ________________________________; declaro bajo juramento haber recibido y entendido la inducción del Anexo 4, además doy fe de que identifico los peligros, evaluó y controlo los riesgos realizando Trabajo Seguro que existen en el área de trabajo.</p>
		</div>
		<div class="delante" id="parrafo2-2">
			<p class="p">En señal de total conformidad y asumiendo la responsabilidad que implica firmo el presente documento con mi huella digital. Firmo en la ciudad de __________________________, siendo el día ______ del año __________.  </p>
		</div>
		<div class="delante " id="subguion-2"><p class="izquierda">__________________________________ </p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Nombre: <b>NOMBRE DEL PERSONAL</b></p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">DNI:<b> DNI<b> </p>
		</div>
		<div class="cuadrado"></div>
	</div>

	<div>
		<div style="page-break-after:always;"></div>   <!--SIGUIENTE PÁGINA-->

		<div class="delante estiloletra centro" id="anexo2">ANEXO C</div>
		<div class="delante estiloletra centro" id="declaracion1-3">FORMATO DE DECLARACION DE INGRESO DE TRABAJO TEMPORAL Y EXONERACIÓN DE RESPONSABILIDAD</div>
		<div class="delante" id="parrafo1-3">
			<p style="margin-top:-1px; margin-bottom:0px;">Apellidos y Nombres: ________________________________________</p>
			<p style="margin-top:-1px; margin-bottom:0px;">Domicilio: __________________________________________________</p>
			<p style="margin-top:-1px; margin-bottom:0px;">Tipo de Documento de Identidad: _____________ Nº:____________</p>
			<p style="margin-top:-1px; margin-bottom:0px;">Edad: _____ Sexo: _________ Grupo Sanguíneo: ________________</p>
			<p style="margin-top:-1px; margin-bottom:0px;">Institución de Procedencia (Razón Social): __________________</p>
			<p style="margin-top:-1px; margin-bottom:0px;">_______________________________________________.</p>
		</div>
		<div class="delante" id="parrafo2-3">
			<p class="p">CONDICIONES GENERALES Por el presente documento, EL TRABAJADOR TEMPORAL declara conocer que la visita a las instalaciones de la Compañía puede poner en riesgo su salud o su integridad física por encontrarse éste, a más de 4,500 metros sobre el nivel del mar y además por el riesgo propio de las actividades que se desarrollan en dichas instalaciones; no obstante, persiste en su interés en realizar su ingreso, el mismo que realiza de forma voluntaria. </p><p>
			EL TRABAJADOR TEMPORAL se obliga a cumplir todas las disposiciones y medidas de seguridad que establezca la Compañía para la realización de su trabajo temporal, en cuanto a su oportunidad de ingresar a lugares u otras condiciones en que se llevará a cabo su trabajo temporal.
			</p ><p  class="p">
			Queda perfectamente establecido que la Compañía, no se responsabilizará por cualquier tipo de daño patrimonial o extra patrimonial como son el daño a l a persona, daño emergente, lucro cesante, daño moral, entre otros; así como cualquier tipo de lesiones o accidentes que pueda sufrir EL TRABAJADOR TEMPORAL debido a la imprudencia de éste o al incumplimiento por parte del mismo con las disposiciones, recomendaciones o medidas de seguridad establecidas
			</p><p  class="p">
			La Compañía, se reserva el derecho de iniciar las acciones a que hubiera lugar en caso que EL TRABAJADOR TEMPORAL incumpla alguna de las disposiciones establecidas en el presente documento.
			</p><p  class="p">
			EL TRABAJADOR TEMPORAL acepta que toda la información proporcionada a la Compañía, es verdadera, Asimismo declara haber leído todas y cada una de las condiciones generales establecidas en el presente documento, respecto de las cuales manifiesta su plena conformidad, como constancia de todo lo cual firma a continuación.
			</p>
		</div>
		<div class="delante " id="subguion-2"><p class="izquierda">__________________________________ </p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">Nombre: <b>NOMBRE DEL PERSONAL</b></p>
		<p class="izquierda" style="margin-top:-2px; margin-bottom:0px;">DNI:<b> DNI<b> </p>
		</div>
	</div>

</body>
</html>