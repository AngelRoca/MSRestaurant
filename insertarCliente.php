<?php
	
	// include("Conexion.php");
	// include('crud.php');
	$mensaje=null;
	if(isset($_POST['insertarCliente'])){
		
		$nombre = htmlspecialchars($_POST['nombre']);
		$rfc = htmlspecialchars($_POST['rfc']);
		$pApellido = htmlspecialchars($_POST['pApellido']);
		$sApellido = htmlspecialchars($_POST['sApellido']);
		$direccion=htmlspecialchars($_POST['direccion']);

		
		if(($nombre=='') || ($rfc=='') || ($direccion=='') || ($pApellido=='') || ($sApellido)==''){$mensaje="Error todos los datos son requeridos";
		
		}else { 
		
		$model = new Crud;
		$model ->insertInto='cliente';
		$model ->insertColumns='nombre,RFC,pApellido,sApellido,direccion';
		$model ->insertValues ="'$nombre','$rfc','$pApellido','$sApellido','$direccion'";
		$model ->Create();
		$mensaje=$model->mensaje;
		}
	}
?>

          		<div class="col-lg-4" >
          		<?php echo $mensaje; ?> 
          		<form class="form-horizontal style-form" name="formClientes" id="formClientes" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Nombre del Cliente</label>
                              <div class="col-sm-8">
                                  <input type="text" name="nombre" id="nombre" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Primer apellido del Cliente</label>
                              <div class="col-sm-8">
                                  <input type="text" name="pApellido" id="pApellido" class="form-control">
                              </div>
                 </div><!--fin del form group-->

<div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Segundo apellido del Cliente</label>
                              <div class="col-sm-8">
                                  <input type="text" name="sApellido" id="sApellido" class="form-control">
                              </div>
                 </div><!--fin del form group-->

                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">RFC</label>
                              <div class="col-sm-8">
                                  <input type="text" name="rfc" id="rfc" class="form-control">
                              </div>
                 </div><!--fin del form group-->
                 <div class="form-group">
                              <label class="col-sm-6 col-sm-6 control-label">Dirección del Cliente</label>
                              <div class="col-sm-8">
                                  <input type="text" name="direccion" id="direccion" class="form-control">
                              </div>
                 </div><!--fin del form group-->

                
                 
                 
                 
                <input type="hidden" name="insertarCliente">
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Insertar nuevo Cliente</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->


