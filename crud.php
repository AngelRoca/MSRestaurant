<?php 
	class Crud{
		public $insertInto;
		public $insertColumns;
		public $insertValues;
		public $mensaje;
		public $select;
		public $from;
		public $condition;
		public $rows;
		public $update;
		public $set;
		public $deleteFrom;
		private $debug = true;
		

		public function Create(){
		
			$model = new Conexion;
			$conexion = $model -> conectar();
			$insertInto = $this->insertInto;
			$insertColumns = $this ->insertColumns;
			$insertValues = $this ->insertValues;
			$sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
			$this->debug = false;
			$this->debuger($sql);
			$consulta = $conexion->prepare($sql);
			if(!$consulta){
				$this->mensaje = "Error al crear el registro";
			}else{
				$consulta->execute();
				$this->mensaje = "Registro creado correctamente";
			}
			
		}//fin funcion Create
		
		public function Read(){
		
			$model = new Conexion;
			$conexion = $model -> conectar();
			$select= $this->select;
			$from= $this->from;
			$condition= $this->condition;
			if($condition!=''){
				$condition= " WHERE ". $condition;
			}
			$sql = "SELECT $select FROM $from $condition";
			$this->debuger($sql);
			$consulta= $conexion->prepare($sql);
			$consulta->execute();

			while ($filas=$consulta->fetch()){
				$this->rows[]=$filas;
			}
		}//fin funcion Read
		
		public function Update(){
			$model = new Conexion;
			$conexion = $model->conectar();
			$update=$this->update;
			$set=$this->set;
			$condition=$this->condition;
			if($condition!=''){
				$condition= " WHERE ". $condition;
			}
			$sql = "UPDATE $update SET $set $condition";
			$this->debuger($sql);
			$consulta=$conexion->prepare($sql);
			if(!$consulta)
			{
				$this->mensaje="Ha ocurrido un error al actualizar el registro";
				
			}else{
				$consulta->execute();
				$this->mensaje="Registro actualizado";
				
			}
	 }//fin funcion UPDATE
	
		public function Delete(){
		
			$model = new Conexion();
			$conexion = $model->conectar();
			$deleteFrom = $this->deleteFrom;
			$condition=$this->condition;
			if($condition != ''){
				
				$condition = " WHERE ". $condition;
			}
			$sql = "DELETE FROM $deleteFrom $condition";
			$this->debuger($sql);
			$consulta = $conexion->prepare($sql);
			if(!$consulta)
				{
					$this->mensaje="Error al eliminar el registro";
					
				}else{
					$consulta->execute();
					$this->mensaje="Registro eliminado con exito";
					
				}
	
			
		}	//fin de delete
		
		private function debuger($var){
			if($this->debug == true){
				echo "<pre>";
				var_dump($var);
				echo "</pre>";
			}
		}
		
	}//class CRUD
	
	
?>