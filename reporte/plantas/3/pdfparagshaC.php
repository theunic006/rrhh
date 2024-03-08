<?php

$fecha = date("Y-m-d");

$path = '../../logo2.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

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
    <title>Contrato</title>
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
			top:20px;
			left:45px;
			right: 0px;
			bottom:0px;
			width:700px;
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
		#anexo2{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:110px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
			text-decoration: underline;
		}
		#clausulas{
			font-family: "arial", "Courier New", monospace;
			font-weight: bold;
			position:absolute;
			top:420px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:100%;
			font-size:17px;
		}
		#expide{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:300px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
		}
		td{
			padding:4px;
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
		#gerencia{
			font-family: "arial", "Courier New", monospace;
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
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:120px;
			left:58px;
			right: 0px;
			bottom:0px;
			font-size:13px;
		}
		#cabeza{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:140px;
			left: 70px;
			right: 0px;
			bottom:0px;
			width:80%;
			font-size:17px;
			text-align: justify;
			line-height: 23px;
		}	
		#parrafo1{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:420px;
			left: 56px;
			right: 0px;
			bottom:0px;
			width:82%;
			font-size:17px;
			text-align: justify;
			line-height: 25px;
		}	
		#parrafo2{
			font-family: "arial", "Courier New", monospace;
			position:absolute;
			top:50px;
			left: 60px;
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
			top:500px;
			left: 100px;
			right: 0px;
			bottom:0px;
			font-size:15px;
			text-align: justify;
		}	
		.p{
			word-spacing:-3px;
			letter-spacing: -0.5px;	
		}
		.circulo{
			list-style-type: disc;
		}
		#pagina3firma{
			position:absolute;
			top:430px;
			left:490px;
			right: 0px;
			bottom:0px;
			width:150px;
			height: 100px;
		}
    </style>
</head>
<body>
	<div>
		<div><img id="logo" src="<?php echo $logo;?>"></div>
		<div class="delante estiloletra centro" id="anexo2">CONTRATO DE TRABAJO TEMPORAL</div>
		<div id="cabeza">
			<p>
			Conste por el presente documento CONTRATO DE TRABAJO a plazo temporal que suscribimos, por una parte EMPRESA SOLUCIONES INDUSTRIALES DEJOTA SAC, con RUC N°20542431033, con domicilio en la carretera central Mz. R Lot 16 PP.JJ. Túpac Amaru Sector 1 CHAUPIMARCA - PASCO debidamente representada por su Gerente General ALIAGA TAPIA Daniel Josué con DNI N° 440682571, a quien se denomina en este contrato <b>LA EMPRESA</b>; y por la otra el Sr. <b><?php echo $nombre?></b> DNI N° <b><?php echo $dni?></b> de Estado civil <b><?php echo $estadocivil?></b> y con domicilio <b><?php echo $direccion?></b>, a quien se denominará TRABAJADOR, por nuestros propios derechos hacemos constar que hemos convenido en celebrar un contrato de trabajo en los términos siguientes:
			</p>
		</div>
		<div id="clausulas">CLAUSULAS:</div>
		<div id="parrafo1">
			<ul class="circulo p">
				<li><p><b>PRIMERA.- LA EMPRESA</b> es un Contratista Minero, cuyo objeto social es prestar servicios especializados a terceros en mantenimiento, montaje de plantas concentradoras y demás actividades mineras por lo que se requiere los servicios del <b>TRABAJADOR</b> en forma temporal para cubrir las necesidades del mercado acorde a las actividades que realiza <b>LA EMPRESA</b></p>
				<p style="margin-top:-15px; margin-bottom:0px;">Declara el trabajador que tiene completa capacidad y los conocimientos necesarios para desempañar el trabajo de: ______________ en esa virtud, la empresa acepta ocuparlo para el desempeño de las labores mencionadas y actividades conexas. El trabajador estará obligado a prestar sus servicios en trabajos complementarios que le encomiende la empresa cuando no haya actividad específica acostumbrada.</p></li>
				<li><b>SEGUNDA.-</b> Este contrato será desde el ______________ hasta el _____________ cumpliendo los días de trabajo se extingue el presente contrato.</li>
				<li><b>TERCERA: </b>El pago se hará en efectivo cubriendo en su totalidad el que hay devengado el tiempo que labora el trabajador, quien deberá emitir mediante el recibo por honorarios. De no hacer reclamación alguna al efectuarse el pago, se entenderá que está conforme con la liquidación respectiva. </li>
				<li><b>CUARTA.-</b> A criterio propio <b>EL TRABAJADOR </b>puede laborar tiempo extraordinario, a menos que <b>LA EMPRESA </b>solicite que no se puede laborar.</li>
				<li><b>QUINTA.- EL TRABAJADOR </b>está obligado a someterse a un reconocimiento médico, al tiempo de su ingreso al ser requerido de la empresa. Así mismo, en todo lo no previsto en el presente contrato, se estará a lo que establece la ley de la materia.</li>
			</ul>
			 
			
		</div>
		<div style="page-break-after:always;"></div>   <!--SIGUIENTE PÁGINA-->
		<div id="parrafo2">
			<ul class="circulo p">
				<li><b>SEXTA. - EL TRABAJADOR </b>percibirá por sus servicios una remuneración, por horas durante el tiempo laboral. En caso exceda del tiempo laboral se le reconocerá las horas extras trabajadas.</li>
				<li><b>SEPTIMA.- </b>EL TRABAJADOR está terminantemente prohibido consumir alcohol durante su permanencia en el trabajo caso contrario se dará obligado a LA EMPRESA al cese inmediato del trabajador.</li>
				<li><b>OCTAVA.-</b> Este contrato queda sujeto a las disposiciones que contiene TUO del D Leg N° 728 aprobado por D.S.N° 003-97-TR ley de productividad y competitividad labora</li>
			</ul>
		</div>
		<div id="expide">Se expide y suscribe la presente en tres ejemplares de un mismo tenor en la ciudad de CERRO DE 	PASCO a los ____ día(s) de _____________del _________.
		</div>
		<div><img id="pagina3firma" src="<?php echo $imagenfirma;?>"></div>
		<div class="delante" id="subguion"><p class="p">........................                   ............................. </p>
			<p class="p" style="margin-top:-2px; margin-bottom:0px;">       LA EMPRESA                                   TRABAJADOR</p>
		</div>
	</div>
</body>
</html>