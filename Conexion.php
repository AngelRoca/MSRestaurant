<?php 
	class Conexion{
	
		public function conectar(){		
		$usuario = 'root';
		$password = 'spaceship';
		$host = 'localhost';
		$db = 'Restaurante';
		return $conexion = new PDO("mysql:host=$host;dbname=$db",$usuario,$password);
		}

	}
	
	
?>