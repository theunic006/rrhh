<?php

require_once "../controladores/personal.controlador.php";
require_once "../modelos/personal.modelo.php";


class TablaPersonal{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PERSONAL
  	=============================================*/ 

	public function mostrarTablaPersonal(){

		$valor = $_GET["id"];

  		$personal = ControladorPersonales::ctrMostrarPersonalesT($valor);


  		if(count($personal) == 0){

  			echo '{"data": []}';

		  	return;
  		}	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($personal); $i++){

			$firma =$personal[$i]["firma"];
            $huella =$personal[$i]["huella"];
			$dni =$personal[$i]["dni"];
            $dnii =$personal[$i]["dnii"];
            $cv =$personal[$i]["cv"];
            $observacion =$personal[$i]["observacion"];
            $examen =$personal[$i]["certificado"];
            $induccion =$personal[$i]["induccion"];
			$acta =$personal[$i]["acta"];

			$exfechaini =$personal[$i]["exfechaini"];
            $exfechafin =$personal[$i]["exfechafin"];
			$infechaini =$personal[$i]["infechaini"];
            $infechafin =$personal[$i]["infechafin"];

			$examenNum =$personal[$i]["certificado"];
            $induccionNum =$personal[$i]["induccion"];
			$actaNum =$personal[$i]["acta"];

			$idplanta=$personal[$i]["idplanta"];

            if($firma=='SI'){$firma = '25';}else{$firma = '0';}
            if($huella=='SI'){$huella = '25';}else{$huella = '0';}
            if($dnii=='SI'){$dnii = '25';}else{$dnii = '0';}
            if($cv=='SI'){$cv = '25';}else{$cv = '0';}
			if($examenNum=='SI'){$examenNum = '25';}else{$examenNum = '0';}
            if($induccionNum=='SI'){$induccionNum = '15';}else{$induccionNum = '0';}
			if($actaNum=='SI'){$actaNum = '10';}else{$actaNum = '0';}

            $total = $firma+$huella+$dnii+$cv;
            $progreso = ($total/2)+$examenNum+$induccionNum+$actaNum;
			$seleccionar = 'fa-file-pdf-o';
			$ok = 'Descargar';

			$total2 = ($total/2)+$examenNum+$induccionNum+$actaNum;
            
            if($progreso<'51'){
              $progreso = 'danger';
              $badge = 'red';
            }elseif ($progreso<'91') {
              $progreso = 'yellow';
              $badge = 'yellow';
            }else{
              $progreso = 'green';
              $badge = 'green';
            }

            if($observacion=='SI')
			{
				$observacion='danger ';
				$seleccionar = 'fa-ban';
				$ok = 'Error';
			}else{
				if($total2<100){
					$observacion='warning ';
					$seleccionar = 'fa-ban';
					$ok = 'Error';
				}else{
					$observacion='primary ';
					$seleccionar;
					$ok = 'Descargar';
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

			$progreso2 = "<div class='progress progress-xs'><div class='progress-bar progress-bar-".$progreso."' style='width: ".$total2."%'></div></div><span class='badge bg-".$badge."'>".$total2."%</span>";

			$examenes2 = "<div class='btn-group'><button class='".$examen." btnEditarExamen' data-toggle='modal' data-target='#modalEditarExamen' idExamen='".$personal[$i]["id"]."'><i class='fa fa-user-md'></i> Ex Medico</button><button class='".$induccion." btnEditarInduccion' data-toggle='modal' data-target='#modalEditarInduccion' idInduccion='".$personal[$i]["id"]."'><i class='fa fa-odnoklassniki-square'></i> Induccion</button></div>";

			$preparar = "<div class='btn-group'><button class='btn btn-primary anexoABC' idPersonal='".$personal[$i]["id"]."' idPlanta='".$personal[$i]["idplanta"]."'><i class='fa fa-dropbox'></i> Preparar</button></div>"; 

		  	$botones = "<div class='btn-group'><button class='btn btn btn-".$observacion." procesarPdf' idPersonal='".$personal[$i]["id"]."'><i class='fa ".$seleccionar."'></i> Procesar</button><button class='btn btn btn-success verPdf' idPersonal='".$personal[$i]["id"]."'idTarea='".$_GET["id"]."'idPlanta='".$personal[$i]["idplanta"]."'idDni='".$personal[$i]["dni"]."'><i class='fa fa-eye'></i>  Ver</button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$personal[$i]["nombre"].'",
				  "'.$personal[$i]["dni"].'",
			      "'.$personal[$i]["cargo"].'",
			      "'.$progreso2.'",
				  "'.$examenes2.'",
				  "'.$preparar.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 
		 }';	
		echo $datosJson;
	}
}

	$activarPersonal = new TablaPersonal();
	$activarPersonal -> mostrarTablaPersonal();
