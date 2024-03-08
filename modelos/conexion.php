<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=rrhh",
			            "rrhh",
			            "MR2?-C#]X[IQ");

		$link->exec("set names utf8");

		return $link;

	}

}