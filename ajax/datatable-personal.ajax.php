<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";


class TablaPersonal{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PERSONAL
  	=============================================*/ 

	public function mostrarTablaPersonal(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$personal = ControladorPersonales::ctrMostrarPersonales($item, $valor, $orden);


  		if(count($personal) == 0){

  			echo '{"data": []}';

		  	return;
  		}	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($personal); $i++){

			$firma =$personal[$i]["firma"];
            $huella =$personal[$i]["huella"];
            $dnii =$personal[$i]["dnii"];
            $cv =$personal[$i]["cv"];
            $observacion =$personal[$i]["observacion"];
            $examen =$personal[$i]["certificado"];
            $induccion =$personal[$i]["induccion"];
			$acta =$personal[$i]["acta"];

            if($firma=='SI'){$firma = '25';}else{$firma = '0';}
            if($huella=='SI'){$huella = '25';}else{$huella = '0';}
            if($dnii=='SI'){$dnii = '25';}else{$dnii = '0';}
            if($cv=='SI'){$cv = '25';}else{$cv = '0';}

            $total = $firma+$huella+$dnii+$cv;
            $progreso = $firma+$huella+$dnii+$cv;
			$seleccionar = 'fa-thumbs-o-up';
			$ok = 'ok';
            
            if($progreso<'51'){
              $progreso = 'danger';
              $badge = 'red';
            }elseif ($progreso<'76') {
              $progreso = 'yellow';
              $badge = 'yellow';
            }else{
              $progreso = 'green';
              $badge = 'green';
            }

            if($observacion=='SI')
			{
				$observacion='danger ';
				$seleccionar = 'fa-thumbs-o-down';
				$ok = 'No';
			}else{
				if($total<100){
					$observacion='warning ';
					$seleccionar = 'fa-thumbs-o-down';
					$ok = 'No';
				}else{
					$observacion='primary ';
					$seleccionar;
					$ok = 'ok';
				}}

            if($examen=='NO'){$examen='btn btn-danger ';}else{$examen='btn btn-success ';}

            if($induccion=='SI' && $acta == 'SI'){
				$induccion='btn btn-success ';
			}else{
				$induccion='btn btn-danger ';
			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 
			$progreso2 = "<div class='progress progress-xs'><div class='progress-bar progress-bar-".$progreso."' style='width: ".$total."%'></div></div><span class='badge bg-".$badge."'>".$total."%</span>";

			$examenes2 = "<div class='btn-group'><button class='btn btn-primary btnEditarPersonal' data-toggle='modal' data-target='#modalEditarPersonal' idPersonal=''><i class='fa fa-eye'></i></button><button class='".$examen." btnEditarExamen' data-toggle='modal' data-target='#modalEditarExamen' idExamen=''><i class='fa fa-user-md'></i> EM</button><button class='".$induccion." btnEditarInduccion' data-toggle='modal' data-target='#modalEditarInduccion' idInduccion=''><i class='fa fa-odnoklassniki-square'></i> ID</button></div>";

		  	$botones = "<div class='btn-group'><button class='btn btn btn-".$observacion." agregarPersonal recuperarBoton' idPersonal='".$personal[$i]["id"]."'><i class='fa ".$seleccionar."'></i> ".$ok."</button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$personal[$i]["nombre"].'",
				  "'.$personal[$i]["dni"].'",
			      "'.$personal[$i]["cargo"].'",
			      "'.$progreso2.'",
				  "'.$examenes2.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PERSONAL ACTIVO
=============================================*/ 
$activarPersonal = new TablaPersonal();
$activarPersonal -> mostrarTablaPersonal();

