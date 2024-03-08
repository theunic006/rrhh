<?php

$fecha = date("Y-m-d");

$path = 'logo.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$logodj = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

?>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
    <style>

		@page {
			margin-left: 43px;
		}
		#container:last-child { 
      		page-break-after: never; 
		}
		body{
			margin:0;
			padding:0;

			font-family:'Arial';
		}
		#header {
		position: absolute;  
		left: 0px;
		top: -20px;
		right: 0px;
		height: 50px;
		text-align: center;   
		}
		#logo {
			width: 120;
			text-align: center;
		}
		#container {
			margin-top: 100px;
		}
		#cabeza {
			padding-top: -10px;   
		}
		td {
			font-size: 9;
		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			padding-bottom:6px;
			padding-top:-1px;
			padding-right: -7.5px;
		}
		.center{
			text-align: center;
		}
		#observaciones{
			height: 80px;
			text-align:top;
		}
		#firma {
			text-align:top;
			padding-bottom:80px;

		}
		.tamano15{
			font-family:'ArialB';
			font-size:17px;
			text-align:center;
		}
		table tbody th{
		}

    </style>
</head>
<body>
	<div id="header">
		<table id="cabeza">
          <tbody>
            <tr>
            	<td colspan="3" style="width:100px;"><img id="logo" src="<?php echo $logodj;?>" alt="DJ"></td>
              <td colspan="9" style="width:600px;">
            	<div class="tamano15 centro">REPORTE DE LISTA DE PERSONAL CALIFICADO:<?php echo $planta ?></div>
              </td>
              
            </tr>
            <tr>
              <td colspan="3" width="25%"><label>FOR-DJ-LOG-05</label></td>
              <td colspan="3" width="25%"><label>Revisión 03</label></td>
              <td colspan="3" width="25%"><label>Fecha: <?php echo $fecha?></label></td>
              <td colspan="3" width="25%"><label>Páginas 1 de 1 </label></td>
            </tr>
          </tbody>

        </table>
	</div>
		
	<div id="container">
        <table>
          <tbody>
            <tr> 
              <td style="width:30px;"><div class="tamano15">#</div></td>
              <td style="width:300px;"><div class="tamano15">Nombre</div></td>
              <td style="width:365px;"><div class="tamano15">Cargo</div></td>
            </tr>
            <?php
            foreach ($personal as $key => $item) {
              echo '<tr>
                      <td class="center">'.$key.'</td>
                      <td style="padding-left:5px;">'.$item["nombre"].'</td>
                      <td style="padding-left:5px;">'.$item["cargo"].'</td>';
              echo ' </tr>';
            }
            ?>
          </tbody>
        </table>
    </div>

	<div id="footer" >
	<table width="100%">
		<tbody >

		<tr>
			<td id="observaciones">Observaciones:</td>
			<td id="firma">Firma:</td>
		</tr>
		</tbody>
	</table>
	</div>		
</body>
</html>