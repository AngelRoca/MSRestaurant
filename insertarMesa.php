<?php
	
	//include("Conexion.php");
	//include('crud.php');
	$mensaje=null;
	if(isset($_POST['insertarMesa'])){
		$descripcion = htmlspecialchars($_POST['descripcion']);
		$ocupado = htmlspecialchars($_POST['ocupado']);
		
		if(($descripcion || $ocupado)==''){$mensaje="Error todos los datos son requeridos";
		}else { 
		$model = new Crud;
		$model ->insertInto='mesas';
		$model ->insertColumns='descripcion,ocupado';
		$model ->insertValues ="'$descripcion','$ocupado'";
		$model ->Create();
		$mensaje=$model->mensaje;
		}
	}
?>

          		<div class="col-lg-5" >
          		<?php echo $mensaje; ?> 
          		<form class="form-horizontal style-form" name="formMesas" id="formMesas" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          		<div class="form-group">
                              <label class="col-sm-7 col-sm-7 control-label">Descripcion (Mesa # o Llevar)</label>
                              <div class="col-sm-6">
                                  <input type="text" name="descripcion" id="descripcion" class="form-control">
                              </div>
                              
                 </div><!--fin del form group-->
                 <div class="form-group">
	                 <label class="col-sm-2 col-sm-2 control-label">Ocupado</label>
                              <div class="col-sm-4">
                              <select name="ocupado"><option value="si">Si</option><option value="no">No</option></select>   
                              </div>
                 </div>
                 
                 
                 
                 
                <input type="hidden" name="insertarMesa">
                <button class="btn btn-theme02" type="submit"><i class="fa fa-check"></i> Insertar una Nueva Mesa en el Restaurante</button>
          		</form><!--FIN DEL FORM-->
          		
          		</div><!--fin del col lg 6-->


