<?php

session_start();
require_once("Conexion.php");
require_once("crud.php");		
	$model = new Crud;
	$model->select = '*';
	$model->from = 'usuarios';

	$nombre=$_POST["nick"];
	$pass=$_POST["password"];
	$model->condition=" nombre='$nombre' AND pass='$pass'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
//printf($total);	 



if($total==1){
	foreach($filas as $fila){
		$_SESSION['nombre'] = $fila['nombre'];	
		$_SESSION['nivel'] = $fila['nivel'];		
		$nivel=$fila['nivel'];
    	
    	if($nivel=='Administrador') header('Location:index.php');
        if($nivel=='Cocina')header('Location:cocina.php');
        if($nivel=='Personal')header('Location:personal.php');
    }
 
 	}else{
 		header('Location:login.php');
 	}
 

?>