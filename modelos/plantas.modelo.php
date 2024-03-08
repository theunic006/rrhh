<?php

require_once "conexion.php";

class ModeloPlantas{

	/*=============================================
	CREAR PLANTA
	=============================================*/

	static public function mdlIngresarPlanta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion) VALUES (:nombre, :descripcion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PLANTAS
	=============================================*/

	static public function mdlMostrarPlantas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR NOMBRE DE PLANTA
	=============================================*/

	static public function mdlMostrarPlantaNombre($idPlanta){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM planta WHERE id = '1'");
		$stmt -> execute();

		return $stmt -> fetch();


	$stmt -> close();
	$stmt = null;

}
	/*=============================================
	MOSTRAR PLANTAS EN TAREAS
	=============================================*/

	static public function mdlMostrarPlantasTareas($idPlanta, $idTarea){


			$stmt = Conexion::conectar()->prepare("SELECT t.*, p.nombre, p.id as planta FROM tareas t INNER JOIN planta p ON p.id=t.idplanta WHERE t.id='$idTarea' AND t.idplanta = '$idPlanta'");
			$stmt -> execute();

			return $stmt -> fetch();


		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	EDITAR PLANTA
	=============================================*/

	static public function mdlEditarPlanta($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR PLANTA
	=============================================*/

	static public function mdlBorrarPlanta($tabla, $datos){

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

}

