<?php

require_once "conexion.php";

class ModeloTareas{

	/*=============================================
	MOSTRAR TAREAS
	=============================================*/

	static public function mdlMostrarTareas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE TAREA
	=============================================*/

	static public function mdlIngresarTarea($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo,fechainicio,fechafin,areatrabajo,descripciontrabajo,autoriza,cargoautoriza,supervisor,cargosupervisor,superintendente,cargosuperintendente,residente,cargoresidente,fechacontrato,firmaResidente,idplanta) VALUES (:titulo, :fechainicio, :fechafin, :areatrabajo, :descripciontrabajo, :autoriza, :cargoautoriza, :supervisor, :cargosupervisor, :superintendente, :cargosuperintendente, :residente, :cargoresidente, :fechacontrato, :firmaResidente, :idplanta)");

		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechainicio", $datos["fechainicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $datos["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":idplanta", $datos["idplanta"], PDO::PARAM_STR);
		$stmt->bindParam(":areatrabajo", $datos["areatrabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripciontrabajo", $datos["descripciontrabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":autoriza", $datos["autoriza"], PDO::PARAM_STR);
		$stmt->bindParam(":cargoautoriza", $datos["cargoautoriza"], PDO::PARAM_STR);
		$stmt->bindParam(":supervisor", $datos["supervisor"], PDO::PARAM_STR);
		$stmt->bindParam(":cargosupervisor", $datos["cargosupervisor"], PDO::PARAM_STR);
		$stmt->bindParam(":superintendente", $datos["superintendente"], PDO::PARAM_STR);
		$stmt->bindParam(":cargosuperintendente", $datos["cargosuperintendente"], PDO::PARAM_STR);
		$stmt->bindParam(":residente", $datos["residente"], PDO::PARAM_STR);
		$stmt->bindParam(":cargoresidente", $datos["cargoresidente"], PDO::PARAM_STR);
		$stmt->bindParam(":fechacontrato", $datos["fechacontrato"], PDO::PARAM_STR);
		$stmt->bindParam(":firmaResidente", $datos["firmaResidente"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR NUEVA TAREA
	=============================================*/

	static public function mdlEditarNuevaTarea($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  personal = :personal WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":personal", $datos["personal"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id DESC");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id DESC");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla){	

		$stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PDF TAREAS
	=============================================*/

	static public function mdlMostrarPdfTareas($valor){

			$stmt = Conexion::conectar()->prepare("SELECT t.*, p.nombre AS planta FROM tareas t INNER JOIN planta p ON t.idplanta=p.id WHERE t.id = '$valor' ORDER BY id ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	DEVUELVE ID
	=============================================*/

	static public function mdlDevuelveId($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idplanta='$valor' ORDER BY id DESC LIMIT 1");
		$stmt -> execute();
		return $stmt -> fetchAll();

	$stmt -> close();
	$stmt = null;

}
	
}