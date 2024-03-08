<?php

require_once "conexion.php";

class ModeloPersonales{

	/*=============================================
	CREAR PERSOANLES
	=============================================*/

	static public function mdlIngresarPersonal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,dni,cargo,celular,correo,nacionalidad,genero,estadocivil,gruposanguineo,fechanacimiento,edad,direccion,distrito,provincia,departamento,imagenfirma,imagenhuella,pdfdni,pdfcv) VALUES (:nombre, :dni, :cargo, :celular, :correo, :nacionalidad, :genero, :estadocivil, :gruposanguineo, :fechanacimiento, :edad, :direccion, :distrito, :provincia, :departamento, :imagenfirma, :imagenhuella, :pdfdni, :pdfcv)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":estadocivil", $datos["estadocivil"], PDO::PARAM_STR);
		$stmt->bindParam(":gruposanguineo", $datos["gruposanguineo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenfirma", $datos["imagenfirma"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenhuella", $datos["imagenhuella"], PDO::PARAM_STR);
		$stmt->bindParam(":pdfdni", $datos["pdfdni"], PDO::PARAM_STR);
		$stmt->bindParam(":pdfcv", $datos["pdfcv"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PERSONALES
	=============================================*/

	static public function mdlMostrarPersonales($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare(" SELECT * FROM $tabla ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}



	/*=============================================
	MOSTRAR PERSONALES ----------------
	=============================================*/

	static public function mdlMostrarPersonales2($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT p.*, o.tiene, o.fecha_termina FROM personal p INNER JOIN observacion o ON o.idpersonal=p.id WHERE p.$item = :$item ORDER BY p.id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT p.id,p.nombre, p.dni, p.cargo, p.celular, p.edad, 
			IF(p.imagenfirma = 'NO' OR p.imagenfirma = '', 'NO','SI') as firma, 
			IF(p.imagenhuella = 'NO' OR p.imagenhuella = '', 'NO','SI') as huella,
			IF(p.pdfdni = 'NO' OR p.pdfdni = '' OR p.pdfdni='Archivo No Existe', 'NO','SI') as dnii,
			IF(p.pdfcv = 'NO' OR p.pdfcv = ''OR p.pdfcv='Archivo No Existe', 'NO','SI') as cv,
			IF(e.certificado='NO', 'NO','SI') as certificado,
			IF(i.induccion='NO', 'NO','SI') as induccion,
            IF(i.acta='NO', 'NO','SI') as acta,
			IF(o.tiene='NO', 'NO','SI') as observacion FROM personal p INNER JOIN 
			examenmedico e ON p.id=e.idpersonal INNER JOIN
			induccion i ON p.id=i.idpersonal INNER JOIN
			observacion o ON p.id=o.idpersonal ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}	
	/*=============================================
	MOSTRAR PERSONALES EN TAREA
	=============================================*/

	static public function mdlMostrarPersonales3($tabla, $valor){


			$stmt = Conexion::conectar()->prepare("SELECT p.id,p.nombre, p.dni, p.cargo, p.celular, p.edad, p.idtarea, 
			e.fechainicio AS exfechaini, e.fechafin AS exfechafin,
            i.fechainicio AS infechaini, i.fechafin AS infechafin,
            pl.id as idplanta,
			IF(p.imagenfirma = 'NO' OR p.imagenfirma = '', 'NO','SI') as firma, 
			IF(p.imagenhuella = 'NO' OR p.imagenhuella = '', 'NO','SI') as huella,
			IF(p.pdfdni = 'NO' OR p.pdfdni = '' OR p.pdfdni='Archivo No Existe', 'NO','SI') as dnii,
			IF(p.pdfcv = 'NO' OR p.pdfcv = ''OR p.pdfcv='Archivo No Existe', 'NO','SI') as cv,
			IF(e.certificado='NO', 'NO','SI') as certificado,
			IF(i.induccion='NO', 'NO','SI') as induccion,
            IF(i.acta='NO', 'NO','SI') as acta,
			IF(o.tiene='NO', 'NO','SI') as observacion FROM personal p INNER JOIN 
			examenmedico e ON p.id=e.idpersonal INNER JOIN
			induccion i ON p.id=i.idpersonal INNER JOIN
			observacion o ON p.id=o.idpersonal INNER JOIN
            tareas t ON p.idtarea=t.id INNER JOIN
            planta pl ON pl.id=t.idplanta
            WHERE idtarea = '$valor'
            ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;

	}	
	/*=============================================
	EDITAR PERSONAL
	=============================================*/

	static public function mdlEditarPersonal($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, dni = :dni, cargo = :cargo, celular = :celular, correo = :correo, nacionalidad = :nacionalidad, genero = :genero, estadocivil = :estadocivil, gruposanguineo = :gruposanguineo, fechanacimiento = :fechanacimiento, edad = :edad, direccion = :direccion, distrito = :distrito, provincia = :provincia, departamento = :departamento, imagenfirma = :imagenfirma, imagenhuella = :imagenhuella, pdfdni = :pdfdni, pdfcv = :pdfcv WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":nacionalidad", $datos["nacionalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":genero", $datos["genero"], PDO::PARAM_STR);
		$stmt->bindParam(":estadocivil", $datos["estadocivil"], PDO::PARAM_STR);
		$stmt->bindParam(":gruposanguineo", $datos["gruposanguineo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenfirma", $datos["imagenfirma"], PDO::PARAM_STR);
		$stmt->bindParam(":imagenhuella", $datos["imagenhuella"], PDO::PARAM_STR);
		$stmt->bindParam(":pdfdni", $datos["pdfdni"], PDO::PARAM_STR);
		$stmt->bindParam(":pdfcv", $datos["pdfcv"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR PERSONAL
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

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
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR FAMILIAR
	=============================================*/

	static public function mdlMostrarFamiliar($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT f.*, p.dni FROM familiar f INNER JOIN personal p ON f.idpersonal=p.id WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare(" SELECT f.*, p.dni FROM familiar f INNER JOIN personal p ON f.idpersonal=p.id ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	EDITAR FAMILIAR
	=============================================*/
	static public function mdlEditarFamiliar($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, parentesco = :parentesco, celular = :celular, fotografia = :fotografia, planilla = :planilla, bandera = 'ACTIVO' WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":fotografia", $datos["fotografia"], PDO::PARAM_STR);
		$stmt->bindParam(":planilla", $datos["planilla"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR EXAMEN MEDICO
	=============================================*/

	static public function mdlMostrarExamen($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT e.*, p.dni FROM examenmedico e INNER JOIN personal p ON e.idpersonal=p.id WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare(" SELECT e.*, p.dni FROM examenmedico e INNER JOIN personal p ON e.idpersonal=p.id ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	EDITAR EXAMEN MEDICO
	=============================================*/
	static public function mdlEditarExamen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fechainicio = :fechainicio, fechafin = :fechafin, cantidaddias = :cantidaddias, estado = :estado, clinica = :clinica, vacuna = :vacuna, certificado = :certificado, bandera = 'ACTIVO' WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fechainicio", $datos["fechainicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $datos["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidaddias", $datos["cantidaddias"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":clinica", $datos["clinica"], PDO::PARAM_STR);
		$stmt->bindParam(":vacuna", $datos["vacuna"], PDO::PARAM_STR);
		$stmt->bindParam(":certificado", $datos["certificado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR INDUCCION
	=============================================*/

	static public function mdlMostrarInduccion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT i.*, p.dni FROM induccion i INNER JOIN personal p ON i.idpersonal=p.id WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT i.*, p.dni FROM induccion i INNER JOIN personal p ON i.idpersonal=p.id ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	EDITAR EXAMEN INDUCCION
	=============================================*/
	static public function mdlEditarInduccion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fechainicio = :fechainicio, fechafin = :fechafin, estado = :estado, causa = :causa, induccion = :induccion, acta = :acta, bandera = 'ACTIVO' WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":fechainicio", $datos["fechainicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $datos["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":causa", $datos["causa"], PDO::PARAM_STR);
		$stmt->bindParam(":induccion", $datos["induccion"], PDO::PARAM_STR);
		$stmt->bindParam(":acta", $datos["acta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	MOSTRAR OBSREVACION
	=============================================*/

	static public function mdlMostrarObservacion($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT o.*, p.dni FROM observacion o INNER JOIN personal p ON o.idpersonal=p.id WHERE $item = :$item ORDER BY id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT o.*, p.dni FROM observacion o INNER JOIN personal p ON o.idpersonal=p.id ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}
	/*=============================================
	EDITAR OBSERVACION
	=============================================*/
	static public function mdlEditarObservacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo = :tipo, observacion = :observacion, detalle = :detalle, tiene = :tiene, fecha_termina = :fecha_termina WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
		$stmt->bindParam(":tiene", $datos["tiene"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_termina", $datos["fecha_termina"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR TAREA DE PERSONAL
	=============================================*/

	static public function mdlActualizarTarea($tablaPersonal, $item, $valor, $idtarea){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaPersonal SET $item = $idtarea WHERE id = '$valor'");

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PERSONALES CALIFICADO PARA PDF
	=============================================*/

	static public function mdlMostrarPdfPersonales($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT p.*,DATEDIFF(t.fechafin, t.fechainicio) AS dias , pl.id AS idplanta, pl.nombre as planta, pl.unidadproduccion, pl.pdistrito, pl.pprovincia,
			f.nombre AS familiar, f.parentesco, f.celular AS fcelular, e.certificado, i.induccion, i.acta, t.*
			FROM personal p 
			INNER JOIN familiar f ON p.id=f.idpersonal
			INNER JOIN tareas t ON p.idtarea=t.id 
			INNER JOIN planta pl ON t.idplanta=pl.id 
			INNER JOIN examenmedico e ON e.idpersonal=p.id 
			INNER JOIN induccion i ON i.idpersonal=p.id 
			WHERE p.id = :$item ORDER BY p.id DESC");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare(" SELECT * FROM $tabla ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR EXPERIENCIA
	=============================================*/

	static public function mdlMostrarExperiencia($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;

	}

	/*=============================================
	EDITAR EXPERIENCIA
	=============================================*/
	static public function mdlEditarExperiencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo,empresa,cargo,sector,fechainicio,fechafin,anio,mes,dia,observaciones,idpersonal) 
		VALUES (:tipo, :empresa, :cargo, :sector, :fechainicio, :fechafin, :anio, :mes, :dia, :observaciones, :idpersonal)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
		$stmt->bindParam(":sector", $datos["sector"], PDO::PARAM_STR);
		$stmt->bindParam(":fechainicio", $datos["fechainicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafin", $datos["fechafin"], PDO::PARAM_STR);
		$stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_STR);
		$stmt->bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":idpersonal", $datos["idpersonal"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}