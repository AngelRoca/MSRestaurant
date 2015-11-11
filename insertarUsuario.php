<?php
	
	require_once("Conexion.php");
	require_once('crud.php');
	$mensaje=null;
	if(isset($_POST['insertarUsuario'])){
		$nombre = htmlspecialchars($_POST['nombre']);
		$pass = htmlspecialchars($_POST['pass']);
		$nivel = htmlspecialchars($_POST['nivel']);
		if(($nombre=='') || ($pass=='') || ($nivel=='')){$mensaje="Error todos los datos son requeridos";
		}else { 
		$model = new Crud;
		$model ->insertInto='usuarios';
		$model ->insertColumns='nombre,pass,nivel';
		$model ->insertValues ="'$nombre','$pass','$nivel'";
		$model ->Create();
		$mensaje=$model->mensaje;
		}
	}
?>

          		<div class="col-lg-4" >
          		<?php echo $mensaje; ?> 
          		<form class="form-horizontal style-form" name="formUsuarios" id="formUsuarios" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nombre del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nombre" id="nombre" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Contraseña del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="password" name="pass" id="pass" class="form-control" >
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nivel del Usuario</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nivel" id="nivel" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 
                 
                <input type="hidden" name="insertarUsuario">
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Insertar Usuario</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->


